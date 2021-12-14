<?php
//declare(strict_types=1);

use Yansongda\Pay\Pay;

return [
    'alipay' => [
        'default' => [
            // 支付宝分配的 app_id
            'app_id' => '2021000118636199',
            // 应用私钥
            'app_secret_cert' => 'MIIEpAIBAAKCAQEAmWktFiBAz5Iq8UfmIBMu472enu94ALZsK6R2PgH/2xWVKspNQ2UHuodHVUfFZEigNnvPiQPYlp5HrsE16RquyiS/GigNXZLXSt4VV9g+ikky8LjoqpW9Q11z9dQC1KajHB7+mkpiu9wnoOyU13KsfOfQAi3rIJQBvX+mt/PgthfunbRBxRYgatNKiJ/zllIMUfMG7MbEy69XGM3DuFGlSms/FGnDfTLuksWUJYGtHO55n5nQz0xJNloZvNUDtAeV0uabnU4ZW1C4OZK48RHInnYDfNGwrI+wysA5ScRYzcX2ZlRO6nKfigB6UrxtyzVm6CoMNFqhMFRb7o2icC5ArwIDAQABAoIBAATFRoennRxXWUqDh957ejvOy735iGvNQHPi+2JWQZSYiTj5bYmo/KKKTmeSgcrqj0DifMOwAO4+IdCHZZvIHqNenSq9EB1W0accXOGMcfVu7UybE3EqkuYjY9XDMAtY2z2moRg/M+7Pm9PfR4mjoUWJF+jZcLRkpeE0tQSHavd+npNEBqfb1SxOa1FW7CTb4nn5rpse5F96PTHGj7LVr7Xpz5Chdz41kGNbVZ0zzr1xP6mipJBPBvm9NssKvIZOOVFjtnr25svgnraBbeRgthvu40coCpu4m0s4VG1o5buoKgjdVdvXaQO6iCWx6Sd2kwEHpjyL4HB0hdSEXkS9JHECgYEA5LAClwtjgEBhefYXLWLjBZbmS4oEQUioX7IGDaGY6v5pHULAZauEvdMVD8lQUeaPDndJ86wGGLuFJBPmVCut389960odizR8fQJFT/gFM/DO5iSm7PgsJkKuI/Ncn0DhP4odsbJx0eZ5dNCwacK+MM3KGKhfs0IZJ1inJvuXXfUCgYEAq7uf1vSst8N+LAyZq9l9rlEDHMLKndgdvl8F1JAkLyroEe+t54g4ipKA6cnM33OsaAgd2D61kpz5kmSoZYqEd4GlgIG+h0VM/0heMTmJ4blV0PdHbxIx7Ad9ZsSG/A5JvwV+X8WJHKHTaPccfXRGqniAs/Y8H+INMfFSaTpg+ZMCgYEAhK3VotqZrQQtSbxMcCmqO0j0bikyFMpZ3cOEnY3/EX/vbmmXBKXBivyXgKQ09H+GykbNYhGRK/JH6cmd3YHGDE7u6H8EqwoVm9WgbygfpKX29DGZo2zM+JnBPNxqBX938Axq8/jq7nQATZTydTnmbJxIv4uYkoEr5Ncbi5N2m60CgYEAjOlsM0YavsJjMiO4qEDSlokUw7G17aSaa02vDAamGinbuHPxPy0QL+wcaTjTqXpRuh8G1hxGgqHZStzbLE5neWPg+Dv9qSMdFc88sqli0NtxZgCxFZtZaTGQHRYfKI1Ux6/rTQxaACtsvBEfyHTzUweDm6btGMA0UYmRNJTZY48CgYAD9twya/bzGoXDG7bfXbhFARDnu+dvgAXy6ZNasBXMtRZ/jSMc0UQKOlFme2M+H6Jmlf79QUysvLnv4yz/ZhaxsW63HNVHWtYOtDubRJlaVYXIhuXWR2/xtLWbEdohD5kWUaDTDp1blvsMJwaBnuYAe6CKoUksw/+Q5Mitoj10iw==',
            // 应用公钥证书 路径
            'app_public_cert_path' => storage_path("cert\appCertPublicKey_2021000118636199.crt"),
            // 支付宝公钥证书 路径
            'alipay_public_cert_path' => storage_path("cert\alipayCertPublicKey_RSA2.crt"),
            // 支付宝根证书 路径
            'alipay_root_cert_path' => storage_path("cert\alipayRootCert.crt"),
            'return_url' => "http://shop.test/payment/alipay/return",
            'notify_url' => "http://shop.test/payment/alipay/notify",
            'mode' => Pay::MODE_SANDBOX,
        ],
    ],
    // 分期
    'alipay_installments' => [
        'default' => [
            // 支付宝分配的 app_id
            'app_id' => '2021000118636199',
            // 应用私钥
            'app_secret_cert' => 'MIIEpAIBAAKCAQEAmWktFiBAz5Iq8UfmIBMu472enu94ALZsK6R2PgH/2xWVKspNQ2UHuodHVUfFZEigNnvPiQPYlp5HrsE16RquyiS/GigNXZLXSt4VV9g+ikky8LjoqpW9Q11z9dQC1KajHB7+mkpiu9wnoOyU13KsfOfQAi3rIJQBvX+mt/PgthfunbRBxRYgatNKiJ/zllIMUfMG7MbEy69XGM3DuFGlSms/FGnDfTLuksWUJYGtHO55n5nQz0xJNloZvNUDtAeV0uabnU4ZW1C4OZK48RHInnYDfNGwrI+wysA5ScRYzcX2ZlRO6nKfigB6UrxtyzVm6CoMNFqhMFRb7o2icC5ArwIDAQABAoIBAATFRoennRxXWUqDh957ejvOy735iGvNQHPi+2JWQZSYiTj5bYmo/KKKTmeSgcrqj0DifMOwAO4+IdCHZZvIHqNenSq9EB1W0accXOGMcfVu7UybE3EqkuYjY9XDMAtY2z2moRg/M+7Pm9PfR4mjoUWJF+jZcLRkpeE0tQSHavd+npNEBqfb1SxOa1FW7CTb4nn5rpse5F96PTHGj7LVr7Xpz5Chdz41kGNbVZ0zzr1xP6mipJBPBvm9NssKvIZOOVFjtnr25svgnraBbeRgthvu40coCpu4m0s4VG1o5buoKgjdVdvXaQO6iCWx6Sd2kwEHpjyL4HB0hdSEXkS9JHECgYEA5LAClwtjgEBhefYXLWLjBZbmS4oEQUioX7IGDaGY6v5pHULAZauEvdMVD8lQUeaPDndJ86wGGLuFJBPmVCut389960odizR8fQJFT/gFM/DO5iSm7PgsJkKuI/Ncn0DhP4odsbJx0eZ5dNCwacK+MM3KGKhfs0IZJ1inJvuXXfUCgYEAq7uf1vSst8N+LAyZq9l9rlEDHMLKndgdvl8F1JAkLyroEe+t54g4ipKA6cnM33OsaAgd2D61kpz5kmSoZYqEd4GlgIG+h0VM/0heMTmJ4blV0PdHbxIx7Ad9ZsSG/A5JvwV+X8WJHKHTaPccfXRGqniAs/Y8H+INMfFSaTpg+ZMCgYEAhK3VotqZrQQtSbxMcCmqO0j0bikyFMpZ3cOEnY3/EX/vbmmXBKXBivyXgKQ09H+GykbNYhGRK/JH6cmd3YHGDE7u6H8EqwoVm9WgbygfpKX29DGZo2zM+JnBPNxqBX938Axq8/jq7nQATZTydTnmbJxIv4uYkoEr5Ncbi5N2m60CgYEAjOlsM0YavsJjMiO4qEDSlokUw7G17aSaa02vDAamGinbuHPxPy0QL+wcaTjTqXpRuh8G1hxGgqHZStzbLE5neWPg+Dv9qSMdFc88sqli0NtxZgCxFZtZaTGQHRYfKI1Ux6/rTQxaACtsvBEfyHTzUweDm6btGMA0UYmRNJTZY48CgYAD9twya/bzGoXDG7bfXbhFARDnu+dvgAXy6ZNasBXMtRZ/jSMc0UQKOlFme2M+H6Jmlf79QUysvLnv4yz/ZhaxsW63HNVHWtYOtDubRJlaVYXIhuXWR2/xtLWbEdohD5kWUaDTDp1blvsMJwaBnuYAe6CKoUksw/+Q5Mitoj10iw==',
            // 应用公钥证书 路径
            'app_public_cert_path' => storage_path("cert\appCertPublicKey_2021000118636199.crt"),
            // 支付宝公钥证书 路径
            'alipay_public_cert_path' => storage_path("cert\alipayCertPublicKey_RSA2.crt"),
            // 支付宝根证书 路径
            'alipay_root_cert_path' => storage_path("cert\alipayRootCert.crt"),
            'return_url' => "http://shop.test/installments/alipay/return",
            'notify_url' => "http://shop.test/installments/alipay/notify",
            'mode' => Pay::MODE_SANDBOX,
        ],
    ],
    'wechat' => [
        'default' => [
            // 公众号 的 app_id
            'mp_app_id' => '',
            // 小程序 的 app_id
            'mini_app_id' => '',
            // app 的 app_id
            'app_id' => '',
            // 商户号
            'mch_id' => '',
            // 合单 app_id
            'combine_app_id' => '',
            // 合单商户号
            'combine_mch_id' => '',
            // 商户秘钥
            'mch_secret_key' => '',
            // 商户私钥
            'mch_secret_cert' => '',
            // 商户公钥证书路径
            'mch_public_cert_path' => '',
            // 微信公钥证书路径
            'wechat_public_cert_path' => [
                '' => '',
            ],
            'notify_url' => '',
            'mode' => Pay::MODE_NORMAL,
        ],
    ],
    'http' => [ // optional
        'timeout' => 5.0,
        'connect_timeout' => 5.0,
        // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
    ],
    // optional，默认 warning；日志路径为：sys_get_temp_dir().'/logs/yansongda.pay.log'
    'logger' => [
        'enable' => false,
        'file' => null,
        'level' => 'debug',
        'type' => 'single', // optional, 可选 daily.
        'max_file' => 30,
    ],
];
