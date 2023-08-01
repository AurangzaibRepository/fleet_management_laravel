<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Dashboard extends Model
{
    public function getActivityData(): JsonResponse
    {
        $response = [];

        $activeUserCount = User::where('status', 'Active')
                                ->where('role', '!=', 'Admin')
                                ->count();

        $inactiveUserCount = User::where('status', 'Inactive')
                                ->count();

        $newUserCount = DB::table('users')
                                ->where('role', '!=', 'Admin')
                                ->whereRaw('DateDiff(now(), createdAt) <= 30')
                                ->count();

        /*$userStatusCount = DB::table('users')
                             ->selectRaw('status, count(id) count')
                             ->where('status', '!=', 'Admin')
                             ->groupBy('status')
                             ->orderBy('status')
                             ->get();*/

        $response = [$newUserCount, $activeUserCount, $inactiveUserCount];
        return response()->json($response);
    }

    public function getCurrentUsers(): Collection
    {
        $data = [];

        $userList = User::where('role', '!=', 'Admin')
                    ->where('logged_in', 1)
                    ->orderBy('login_time', 'desc')
                    ->limit(4)
                    ->get();

        foreach ($userList as $user) {
            $lastActive = calculateLastActivity($user->last_active);

            $data[] = [$user->user_name, $lastActive];
        }
        
        return new Collection($data);
    }

    public function getNewUsers(): Collection
    {
        $data = [];

        $userList = User::where('role', '!=', 'Admin')
                        ->whereRaw('DateDiff(now(), createdAt) <= 30')
                        ->orderBy('id', 'desc')
                        ->limit(4)
                        ->get();

        return $userList;
    }

    public function getWhatsAppSessions(): Collection
    {
        $userList = User::where('role', '!=', 'Admin')
                        ->where('whatsapp_session', 1)
                        ->orderBy('whatsapp_session_time', 'desc')
                        ->limit(4)
                        ->get();

        return $userList;
    }


    /*private function calculateLastActivity(string $lastActiveDate): string
    {
        $currentDate = Carbon::now();

        $dateDiff = Carbon::parse($lastActiveDate)->diff($currentDate);
        $dateDiff = $dateDiff->format('%y-%m-%d-%h-%m');
        $dateDiff = Str::of($dateDiff)->split('/[\s-]+/');

        if ($dateDiff[0] > 0){
            //$lastActive = Str::of($lastActive)->append("{$dateDiff[0]} years ");
            return "{$dateDiff[0]} years ago";
        }

        if ($dateDiff[1] > 0){
            return "{$dateDiff[1]} months ago";
        }

        if ($dateDiff[2] > 0){
            return "{$dateDiff[2]} days ago";
        }

        if ($dateDiff[3] > 0){
            return "{$dateDiff[3]} hours ago";
        }

        if ($dateDiff[4] > 0){
            return "{$dateDiff[4]} minutes ago";
        }
    }*/
}
