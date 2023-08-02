<?php

namespace App\DataProviders;

class VehicleProvider extends BaseProvider
{
    public function fetchList(): array
    {
        $response = $this->getRequest(config('app.vehicle_list_url'));

        return $response;
    }

    public function fetchDetails(int $id): array
    {
        $url = config('app.vehicle_list_url')."/{$id}";
        $data = $this->getRequest($url);

        return (array)$data;
    }
}
