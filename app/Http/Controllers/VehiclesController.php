<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class VehiclesController extends Controller
{
    public function __construct(
        private Vehicle $vehicle,
    ) {
    }

    public function index(): view
    {
        return view('vehicles.index', [
            'pageTitle' => config('app.name').' - Vehicles',
        ]);
    }

    public function listing(): JsonResponse
    {
        return $this->vehicle->getListing();
    }
}
