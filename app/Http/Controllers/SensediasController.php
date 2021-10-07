<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
use App\Http\Controllers\Api\ApiError;
use App\Models\Sensedia;
use Illuminate\Http\Request;
use App\Http\Controllers\MktCloudRestApi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SensediasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {

        //GET MKT Cloud Token
        $requestApiToken = new MktCloudRestApi;

        $header = array(
            'Content-Type' => 'application/json',
        );

        $sensedia = $request;

        //GET Business ID and find APIEVENT
        $businessId = $sensedia->id_unidade;
        $apiEvent = Sensedia::UNIDADE_NEGOCIO[$businessId];
        Log::info("$apiEvent");
        exit();

        $request = Http::withHeaders($header)
            ->withToken($requestApiToken->RequestApi())
            ->post(config('services.mkt_cloud.link_entry_journey'), [
                "contactKey" => "expert_sender",
                "EventDefinitionKey" => '"' . $apiEvent . '"', // $apiEvent
                "Data" => $sensedia->all()
            ]);
    }
}
