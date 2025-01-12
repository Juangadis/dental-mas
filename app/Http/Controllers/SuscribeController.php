<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Client\PreApproval\PreApprovalClient;
use MercadoPago\Exceptions\InvalidArgumentException;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\Net\MPSearchRequest;


class SuscribeController extends Controller
{
    private $errorInMp = false;

    /**
     * @throws InvalidArgumentException
     */
    public function __construct()
    {
        MercadoPagoConfig::setAccessToken(config('app.mp_secret'));
        if (config('env') == 'local') {
            MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);
        }
    }

    private function process_payment($request, $request_options)
    {
        
    }

}
