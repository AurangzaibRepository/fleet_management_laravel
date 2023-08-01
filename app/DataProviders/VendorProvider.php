<?php

namespace App\DataProviders;

use Illuminate\Http\JsonResponse;

class VendorProvider extends BaseProvider
{
    public function fetchList(): JsonResponse
    {
        $response = $this->getRequest(config('app.vendor_list_url'));

        echo '<pre>'; print_r($response); exit;
    }
}
