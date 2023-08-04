<?php

namespace App\Http\Controllers;

use App\Models\FuelHistory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class FuelHistoriesController extends Controller
{
    public function __construct(
        private FuelHistory $fuelHistory,
    ) {
    }

    public function index(): view
    {
        return view('fuel-history.index', [
            'pageTitle' => config('app.name').' - Fuel History',
        ]);
    }

    public function listing(): JsonResponse
    {}
}
