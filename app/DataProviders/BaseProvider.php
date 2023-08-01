<?php

namespace App\DataProviders;

use Illuminate\Support\Facades\Http;

class BaseProvider
{
    protected function getRequest(string $url): array|object
    {
        $url = config('app.fleetio_base_url').$url;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Token '.config('app.fleetio_api_key'),
            'Account-Token' => config('app.fleetio_account_token'),
        ])->get($url);

        $response = $response->body();

        return json_decode($response);
    }
}
