<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class VendorsController extends Controller
{
    public function __construct(
        private Vendor $vendor,
    ) {
    }

    public function index(): view
    {
        return view('vendors.index', [
            'pageTitle' => config('app.name').' - Vendors',
        ]);
    }

    public function listing(): JsonResponse
    {
        return $this->vendor->getListing();
    }

    public function details(int $id): view
    {
        return view('vendors.details', [
            'pageTitle' => config('app.name').' - Vendors',
            'data' => $this->vendor->getDetails($id),
        ]);
    }
}
