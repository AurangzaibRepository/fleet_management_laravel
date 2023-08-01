<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    public function __construct(
        private Topic $topic
    ) {
    }

    public function listing($subCategoryID): JsonResponse
    {
        return $this->topic->getListing($subCategoryID);
    }

    public function add(Request $request): void
    {
        $this->topic->saveTopic($request);
        session()->flash('success', 'Topic added successfully');
    }

    public function update(Request $request): void
    {
        $this->topic->updateTopic($request);
        session()->flash('success', 'Topic updated successfully');
    }

    public function delete($id): void
    {
        $this->topic->deleteTopic($id);
        session()->flash('success', 'Topic deleted successfully');
    }
}
