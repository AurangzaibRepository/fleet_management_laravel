<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class SubCategory extends Model
{
    protected $table = 'sub_categories';
    protected $fillable = ['sub_category', 'introduction_text', 'status', 'category_id'];
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    public function getListing($categoryID): JsonResponse
    {
        $data = [
            'data' => []
        ];

        $subCategoryList = $this
                    ->where('category_id', $categoryID)
                    ->get();
            
        foreach ($subCategoryList as $key => $value) {
            $data['data'][] = [
                ($key+1), 
                $value->sub_category, 
                $value->status, 
                $value->id
            ];
        }

        return response()->json($data);
    }

    public function saveRecord(Request $request): void
    {
        $this->create($request->all());
    }

    public function get($subCategoryID): SubCategory
    {
        return $this->find($subCategoryID);
    }

    public function updateRecord(Request $request): void
    {
        $this
            ->where('id', $request->subcategory_id)
            ->update($request->only(['sub_category', 'introduction_text', 'status']));
    }
}
