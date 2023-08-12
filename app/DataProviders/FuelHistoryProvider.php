<?php

namespace App\DataProviders;

class FuelHistoryProvider extends BaseProvider
{
    public function fetchList(): array
    {
        $response = $this->getRequest(config('app.fuel_list_url'));

        return $response;
    }

    public function fetchDetails(int $id): array
    {
        $url = config('app.fuel_list_url')."/{$id}";
        $response = $this->getRequest($url);

        return (array) $response;
    }
}
