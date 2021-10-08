<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class MktCloudRestApi
{
    public static function RequestApi()
    {
        if(!Cache::has('access_token_mkt'))
        {
            // TOKEN SALESFORCE REST
            $urlAuthenticate = config('services.mkt_cloud.link_auth_mkt_cloud');

            $login['grant_type'] = "client_credentials";
            $login['client_id'] = config('services.mkt_cloud.client_id');
            $login['client_secret'] = config('services.mkt_cloud.client_secret');

            $headerLogin = array(
                'Content-Type' => 'application/json',
            );

            $responseLogin = Http::withHeaders($headerLogin)->post($urlAuthenticate, $login);
            // FIM TOKEN SALESFORCE REST

            $bodyLogin = $responseLogin->getBody()->__toString();
            $returnLogin = json_decode($bodyLogin);

            Cache::put('access_token_mkt', $returnLogin->access_token, 1000);
        }

        $cache = Cache::get('access_token_mkt');

        return $cache;
    }
}
