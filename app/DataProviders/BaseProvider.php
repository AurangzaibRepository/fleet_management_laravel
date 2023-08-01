<?php

namespace App\DataProviders;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class BaseProvider
{
    protected function getRequest(string $url): JsonResponse
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
