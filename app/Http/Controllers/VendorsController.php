<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class VendorsController extends Controller
{
    public function index(): view
    {
        return view('vendors.index', [
            'pageTitle' => config('app.name').' - Vendors',
        ]);
    }

    public function listing(): JsonResponse
    {
    }
}
