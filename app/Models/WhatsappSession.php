<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class WhatsappSession extends Model
{
    public $table = 'users';

    public function getListing(Request $request): JsonResponse
    {
        $data = [
            'draw' => $request->draw,
            'data' => []
        ];

        $query = $this->applyFilters($request);
        $data['recordsTotal'] = $query->count();
        $data['recordsFiltered'] = $data['recordsTotal'];
        
        $userList = $query
                        ->limit(10)
                        ->offset($request->start)
                        ->orderBy('id', 'desc')
                        ->get();

        foreach ($userList as $user) {
            $data['data'][] = [
                $user->user_name,
                $user->country,
                $user->phone_no
            ];
        }

        return response()->json($data);
    }

    
    private function applyFilters(Request $request): Builder
    {
        $query = $this->where('role', '!=', 'Admin');

        if ($request->name) {
            $query = $query->where('user_name', 'LIKE', "%{$request->name}%");
        }

        if ($request->phone) {
            $query = $query->where('phone_no', 'LIKE', "%{$request->phone}%");
        }

        return $query;
    }
}
