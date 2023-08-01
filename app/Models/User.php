<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class User extends Authenticatable
{
    public $timestamps = false;
    protected $dates = ['createdAt', 'updatedAt', 'whatsapp_session_time'];

    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getWhatsappSessionTimeAttribute($value): string
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }

    public function getListing(Request $request): JsonResponse
    {
        $response= ['data' => []];
        $date = date('Y-m-d H:i:s');
        $words = ['hour', 'hours', 'minute', 'minutes','second', 'seconds'];
    
        $userListing = $this->applyFilters($request);

        foreach ($userListing as $user) {
            $lastActivity = Carbon::createFromFormat('Y-m-d H:i:s', $user->last_active);
            $lastActivityMsg = $lastActivity->diffForHumans($date);

            $word = explode(' ', $lastActivityMsg)[1];

            if (in_array($word, $words)) {
                $lastActivityMsg = explode(' ', $lastActivityMsg)[0].' '. explode(' ', $lastActivityMsg)[1] . ' ago';
            }

            if (!in_array($word, $words)) {
                $lastActivityMsg = (explode(' ', $lastActivityMsg)[0]) . ' ' . explode(' ', $lastActivityMsg)[1] . ' ago';
            }
        
            array_push($response['data'], [
                $user->user_name,
                $user->id,
                $user->phone_version,
                $lastActivityMsg,
                $user->status,
                $user->country,
                $user->phone_no,
                $user->createdAt,
            ]);
        }

        return response()->json($response);
    }

    public static function changeStatus(int $userID, string $status)
    {
        User::where('id', $userID)
            ->update([
                'status' => $status
            ]);
    }

    private function applyFilters(Request $request): Collection
    {
        $userListing = $this->where('role', 'User');

        if ($request->username != '') {
            $userListing = $userListing->where('user_name', 'LIKE', "%{$request->username}%");
        }

        if ($request->phone != '') {
            $userListing = $userListing->where('phone_no', 'LIKE', "%{$request->phone}%");
        }

        if ($request->status != '') {
            if ($request->status != 'Current') {
                $userListing = $userListing->where('status', $request->status);
            }

            if ($request->status == 'Current') {
                $userListing = $userListing->where('logged_in', 1)
                                           ->orderBy('login_time', 'desc');
            }
        }

        if ($request->joining_date != '') {
            $joiningDate = explode(' - ', $request->joining_date);
            $startDate = Carbon::createFromFormat('d/m/Y', $joiningDate[0])->format('Y-m-d');
            $endDate = Carbon::createFromFormat('d/m/Y', $joiningDate[1])->format('Y-m-d');
            
            $userListing = $userListing->whereRaw("(createdAt between '{$startDate}' and '{$endDate}')");
        }

        if ($request->new == 'true') {
            $userListing = $userListing->whereRaw('datediff(now(), createdAt) <= 30');
        }

        if ($request->whatsapp == 'true') {
            $userListing = $userListing->where('whatsapp_session', 1)
                                        ->orderBy('whatsapp_session_time', 'desc');
        }

        $userListing = $userListing->orderBy('id', 'desc');
        return $userListing->get();
    }

    public function get(): JsonResponse
    {
        $data = $this
                    ->where('role', 'User')
                    ->where('user_name', '!=', null)
                    ->orderBy('user_name')
                    ->select('id', 'user_name')
                    ->get();

        return response()->json($data);
    }

    public function deleteRecord(int $userID): void
    {
        DB::table('feeds_reactions')->where('user_id', $userID)->delete();
        DB::table('community_feeds')->where('user_id', $userID)->delete();
        DB::table('user_registration_answers')->where('user_id', $userID)->delete();
        DB::table('user_cycle_answers')->where('user_id', $userID)->delete();
        DB::table('user_notes')->where('user_id', $userID)->delete();
        DB::table('user_reminders')->where('user_id', $userID)->delete();
        DB::table('user_start_dates')->where('user_id', $userID)->delete();
        $this->destroy($userID);
    }
}
