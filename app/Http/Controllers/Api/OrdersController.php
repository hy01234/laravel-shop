<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\OrderRequest;
use App\Models\ProductSku;
use App\Models\UserAddress;
use App\Models\Order;
use Carbon\Carbon;
use App\Exceptions\InvalidRequestException;
use App\Jobs\CloseOrder;
use Illuminate\Http\Request;
use App\Services\OrderService;
use Yansongda\Pay\Pay;
use App\Http\Requests\SendReviewRequest;
use App\Events\OrderReviewd;
use App\Http\Requests\ApplyRefundRequest;
use App\Models\CouponCode;
use App\Exceptions\CouponCodeUnavailableException;
use App\Http\Requests\CrowdFundingOrderRequest;

class OrdersController
{
    public function test()
    {
        $ret = app('alipay')->refund([
            'out_trade_no' => "20211123160452802488",
            'refund_amount' => "100.00",
            'out_request_no' => "a386bf8224654df694d9758089be13cc",
        ]);
        var_dump($ret);
        exit();
    }
}
