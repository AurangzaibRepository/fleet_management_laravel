<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class VehiclesController extends Controller
{
    public function index(): view
    {
        return view('vehicles.index', [
            'pageTitle' => config('app.name').' - Vehicles',
        ]);
    }
}
