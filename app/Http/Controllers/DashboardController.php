<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function __construct(
        private Dashboard $dashboard
    ) {
    }

    // Default function index
    public function index()
    {
        return view('/dashboard', [
            'pageTitle' => config('app.name'). ' - Analytics',
        ]);
    }
}
