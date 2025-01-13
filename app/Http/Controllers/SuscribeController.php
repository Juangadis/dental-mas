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
        MercadoPagoConfig::setAccessToken(config('app.mp_access_token'));
        if (config('env') == 'local') {
            MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);
        }
    }

    private function suscribe($request, $request_options)
    {
        $preapproval = new PreApprovalClient();
        $request = [
            "card_token_id"=> $request->cardToken,
            "payer_email"=> $request->email,
            "reason"=> "Suscripcion mensual Dental Mas",
            "status"=> "authorized",
            "preapproval_plan_id" => "2c938084944b0eac01945cade0660a05",
            "currency_id" => "ARS",
            "start_date" => date('c', strtotime('+1 day')),
            "end_date" => date('c', strtotime('+1 year'))
        ];

        return "hello";
    }

}
