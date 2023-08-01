<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'category',
        'status',
        'published'
    ];
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    public function getListing(): Collection
    {
        $data = $this
                    ->orderBy('id')
                    ->get();

        return $data;
    }

    public function getAll(string $status = null, bool $draft = false): Collection
    {
        $data = $this->orderBy('id');

        if ($status !== null) {
            $data = $data->where('status', $status);
        }

        if ($draft) {
            $data = $data->where('published', 0);
        }

        return $data->get();
    }

    public function saveRecord(Request $request): void
    {
        $categoryProfile = $this->create($request->all());

        DB::table('registration_question_answers')
            ->insert([
                'label' => $categoryProfile->category,
                'value' => $categoryProfile->category,
                'question_id' => 4,
                'category_id' => $categoryProfile->id,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now()
            ]);
    }

    public function get(int $id): Category
    {
        return $this->find($id);
    }

    public function updateRecord(Request $request): void
    {
        request()->request->remove('_token');

        if (!$request->exists('published')) {
            request()->request->add(['published' => 0]);
        }

        $this
            ->where('id', $request->id)
            ->update($request->all());
    }
}
