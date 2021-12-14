<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use App\Models\Category;
use App\Admin\Controllers\CommonProductsController;
use App\Jobs\SyncOneProductToES;

class ProductsController extends CommonProductsController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    public function getProductType()
    {
        return Product::TYPE_NORMAL;
    }


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->model()->where('type', Product::TYPE_NORMAL)->with(['category']);
        $grid->column('id', __('Id'))->sortable();
        $grid->column('title', __('商品名称'));
        $grid->column('category.name', '类目');
        $grid->column('image', __('封面图片'))->image('', 100, 100);
        $grid->column('on_sale', __('是否上架'))->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->column('price', __('价格'));
        $grid->column('rating', __('评分'));
        $grid->column('sold_count', __('销量'));
        $grid->column('review_count', __('评论数'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('商品名称'));
        $show->field('image', __('封面图片'))->image('', 100, 100);
        $show->field('description', __('商品描述'));
        $show->field('on_sale', __('是否上架'));
        $show->field('price', __('价格'));
        $show->field('rating', __('评分'));
        $show->field('sold_count', __('销量'));
        $show->field('review_count', __('评论数'));

        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }



    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());
        $form->hidden('type')->value(Product::TYPE_NORMAL);
        $form->text('title', __('商品名称'))->rules('required');
        $form->text('long_title', '商品长标题')->rules('required');
        // 添加一个类目字段，与之前类目管理类似，使用 Ajax 的方式来搜索添加
        $form->select('category_id', '类目')->options(function ($id) {
            $category = Category::find($id);
            if ($category) {
                return [$category->id => $category->full_name];
            }
        })->ajax('/admin/api/categories?is_directory=0');
        $form->image('image', __('封面图片'))->rules('required|image');
        $form->editor('description', __('商品描述'))->rules('required');
        $form->radio('on_sale', '上架')->options(['1' => '是', '0'=> '否'])->default('0');
        // 直接添加一对多的关联模型
        $form->hasMany('skus', 'SKU 列表', function (Form\NestedForm $form) {
            $form->text('title', 'SKU 名称')->rules('required');
            $form->text('sku_description', 'SKU 描述')->rules('required');
            $form->text('price', '单价')->rules('required|numeric|min:0.01');
            $form->text('stock', '剩余库存')->rules('required|integer|min:0');
        });

        // 放在 SKU 下面
        $form->hasMany('properties', '商品属性', function (Form\NestedForm $form) {
            $form->text('name', '属性名')->rules('required');
            $form->text('value', '属性值')->rules('required');
        });

        // 定义事件回调，当模型即将保存时会触发这个回调
        $form->saving(function (Form $form) {
            $form->model()->price = collect($form->input('skus'))->where(Form::REMOVE_FLAG_NAME, 0)->min('price') ?: 0;
        });

        $form->saved(function (Form $form) {
            $product = $form->model();

            dispatch(new SyncOneProductToES($product));
        });

        return $form;
    }



}
