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
        $currentUserList = $this->dashboard->getCurrentUsers();
        $newUserList = $this->dashboard->getNewUsers();
        $whatsAppSessionList = $this->dashboard->getWhatsAppSessions();

        return view('/dashboard', [
            'pageTitle' => config('app.name').' - Dashboard',
            'currentUserList' => $currentUserList,
            'newUserList' => $newUserList,
            'whatsAppSessionList' => $whatsAppSessionList,
        ]);
    }

    public function activityData(): JsonResponse
    {
        return $this->dashboard->getActivityData();
    }
}
