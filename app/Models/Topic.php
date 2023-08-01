<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Storage;

class Topic extends Model
{
    protected $table = 'sub_category_topics';
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    protected $fillable = [
        'topic',
        'type',
        'link',
        'path',
        'thumbnail_link',
        'thumbnail_path',
        'sub_category_id',
        'category_id'
    ];

    public function getListing(int $subCategoryID): JsonResponse
    {
        $data = [
            'data' => []
        ];

        $topicList = $this
                        ->where('sub_category_id', $subCategoryID)
                        ->get();

        foreach ($topicList as $key => $value) {
            $data['data'][] = [
                ($key+1),
                $value->topic,
                $value->type,
                $value->id,
                $value->link,
                $value->thumbnail_link
            ];
        }

        return response()->json($data);
    }

    public function saveTopic(Request $request): void
    {
        $category = Category::find($request->category_id);
        $category = Str::replace('/', '_', $category->category);

        $subcategory = Subcategory::find($request->sub_category_id);
        $subcategory = Str::replace('/', '_', $subcategory->sub_category);
        
        if ($request->thumbnail) {
            $thumbnailLink = $this->uploadThumbnail($category, $subcategory, $request->thumbnail);
            //$path = Storage::disk('s3')->put("{$category}/{$subcategory}/test.pdf", $request->video);

            $request->request->add([
                'thumbnail_path' => "thumbnails/{$category}/{$subcategory}/{$request->thumbnail->getClientOriginalName()}",
                'thumbnail_link' => $thumbnailLink
            ]);
        }

        $request->request->add([
            'path' => "{$category}/{$subcategory}/{$request->video->getClientOriginalName()}",
            'link' => $this->uploadVideo($category, $subcategory, $request->video)
        ]);

        $this->create($request->all());
    }

    public function updateTopic(Request $request): void
    {
        $updateArray = [
            'topic' => $request->title,
            'type' => $request->type
        ];

        $topic = $this->find($request->topic_id);
        $category = Category::find($topic->category_id);
        $category = Str::replace('/', '_', $category->category);

        $subcategory = Subcategory::find($topic->sub_category_id);
        $subcategory = Str::replace('/', '_', $subcategory->sub_category);

        if ($request->video) {
            Storage::disk('s3')->delete($topic->path);
            //$path = Storage::disk('s3')->put("{$category}/{$subcategory}", $request->video);

            $path = $request->video->storeAs(
                '',
                "{$category}/{$subcategory}/{$request->video->getClientOriginalName()}",
                ['disk' => 's3']
            );

            $updateArray['link'] = Storage::disk('s3')->url($path);
            $updateArray['path'] = $path;
        }

        if ($request->thumbnail) {
            Storage::disk('s3')->delete($topic->thumbnail_path);
            
            $path = $request->thumbnail->storeAs(
                '',
                "thumbnails/{$category}/{$subcategory}/{$request->thumbnail->getCLientOriginalName()}",
                ['disk' => 's3']
            );

            $updateArray['thumbnail_link'] = Storage::disk('s3')->url($path);
            $updateArray['thumbnail_path'] = $path;
        }

        $this
            ->where('id', $request->topic_id)
            ->update($updateArray);
    }

    public function deleteTopic($id): void
    {
        $topic = $this->find($id);
        Storage::disk('s3')->delete($topic->path);
        Storage::disk('s3')->delete($topic->thumbnail_path);
        $this->destroy($id);
    }

    private function uploadThumbnail(string $category, string $subcategory, $file): string
    {
        $path = $file->storeAs(
            "",
            "thumbnails/{$category}/{$subcategory}/{$file->getClientOriginalName()}",
            ["disk" => "s3"]
        );

        return Storage::disk('s3')->url($path);
    }

    private function uploadVideo(string $category, string $subcategory, $video): string
    {
        $path = $video->storeAs(
            "",
            "thumbnails/{$category}/{$subcategory}/{$video->getClientOriginalName()}",
            ["disk" => "s3"]
        );

        return Storage::disk('s3')->url($path);
    }
}
