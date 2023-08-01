<?php

namespace App\DataProviders;

use Illuminate\Http\JsonResponse;

class VendorProvider extends BaseProvider
{
    public function fetchList(): array
    {
        $response = $this->getRequest(config('app.vendor_list_url'));
    
        return $response;
    }
}
