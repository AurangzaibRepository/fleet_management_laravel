<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class SubCategoriesController extends Controller
{
    public function __construct(
        private SubCategory $subCategory
    ) {
    }

    public function listing($categoryID): JsonResponse
    {
        return $this->subCategory->getListing($categoryID);
    }

    public function add(Request $request): void
    {
        $this->subCategory->saveRecord($request);
        session()->flash('success', 'Subcategory added successfully');
    }

    public function edit($subCategoryID): View
    {
        $data = $this->subCategory->get($subCategoryID);
        $statusArray = config('app.user_status');
        Arr::forget($statusArray, 'Current');

        return view('categories.sub-category')
            ->with([
                'pageTitle' => "Edit {$data->sub_category}",
                'topicTypes' => config('app.topic_types'),
                'statusArray' => $statusArray,
                'data' => $data,
            ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $this->subCategory->updateRecord($request);
        session()->flash('success', 'Subcategory updated successfully');

        return redirect()->route('editSubCategory', $request->subcategory_id);
    }
}
