<?php

namespace App\DataProviders;

class FuelHistoryProvider extends BaseProvider
{
    public function fetchList(): array
    {
        $response = $this->getRequest(config('app.fuel_list_url'));

        return $response;
    }
}