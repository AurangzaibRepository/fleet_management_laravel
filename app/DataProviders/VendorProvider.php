<?php

namespace App\DataProviders;

class VendorProvider extends BaseProvider
{
    public function fetchList(): array
    {
        $response = $this->getRequest(config('app.vendor_list_url'));

        return $response;
    }

    public function fetchDetails(int $id): array
    {
        $response = $this->getRequest(config('app.vendor_detail_url'));

        return $response;
    }
}
