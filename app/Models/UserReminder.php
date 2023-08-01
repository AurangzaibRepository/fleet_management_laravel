<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class UserReminder extends Model
{
    protected $table = 'user_reminders';
    protected $fillable = ['reminder', 'place', 'grades', 'priorities', 'date', 'time', 'repeat', 'user_id'];

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getTimeAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }

    public function getListing(Request $request): JsonResponse
    {
        $response = [
            'draw' => $request->draw,
            'data' => []
        ];

        $query = $this->getQuery();
        $response = $this->getTotal($query, $response);

        $data = $query->limit(10)->offset($request->start)
                      ->orderBy('user_reminders.id', 'desc');

        foreach ($data->get() as $key => $value) {
            $response['data'][] = [
                ($key+1),
                $value->reminder,
                $value->place,
                "{$value->date} {$value->time}",
                $value->user_name,
                $value->id
            ];
        }

        return response()->json($response);
    }

    private function getTotal(Builder $query, array $data): array
    {
        $recordCount = $query;
        $data['recordsTotal'] = $recordCount->count();
        $data['recordsFiltered'] = $data['recordsTotal'];

        return $data;
    }

    private function getQuery(): Builder
    {
        return $this
                ->join('users', 'users.id', 'user_reminders.user_id')
                ->select('user_reminders.*', 'users.user_name');
    }

    public function saveData(array $data): void
    {
        $data = Arr::except($data, ['_token', 'hdn_date', 'hdn_time', 'hdn_userid']);
        $data['date'] = Str::replace('/', '-', $data['date']);
        $data['date'] = date('Y-m-d', strtotime($data['date']));
        
        if (!Arr::exists($data, 'id')) {
            $this->create($data);
            return;
        }
        
        $this
            ->where('id', $data['id'])
            ->update($data);
    }
}
