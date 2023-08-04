<?php

namespace App\Http\Controllers;

use App\Model\FuelHistory;
use Illuminate\Http\Request;

class FuelHistoriesController extends Controller
{
    public function __construct(
        private FuelHistory $fuelHistory,
    ) {
    }
}
