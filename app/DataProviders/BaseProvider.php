<?php

namespace App\DataProviders;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class BaseProvider
{
    protected function getRequest(string $url): Response
    {
        $url = config('app.fleetio_base_url').$url;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Token '.config('app.fleetio_api_key'),
            'Account-Token' => config('app.fleetio_account_token'),
        ])->get($url);

        return $response;
    }
}
