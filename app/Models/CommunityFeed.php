<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Models\Category;
use Carbon\Carbon;

class CommunityFeed extends Model
{
    protected $table = 'community_feeds';
    public $timestamps = false;

    public function getLatest(): Collection
    {
        $feedList = DB::table('community_feeds')
                        ->join('users', 'users.id', 'community_feeds.user_id')
                        ->orderBy('community_feeds.id', 'desc')
                        ->limit(3)
                        ->selectRaw('community_feeds.*, date_format(community_feeds.createdAt, "%M %d, %Y") createdAt, users.user_name')
                        ->get();

        return $feedList;
    }

    public function updateStatus(Request $request): void
    {
        $this
            ->where('id', $request->feedID)
            ->update([
                'status' => $request->status,
                'answer' => $request->answer,
                'category_id' => $request->category_id,
                'updatedAt' => Carbon::now()
            ]);
    }

    public function getListing(Request $request): JsonResponse
    {
        $response = [
            'data' => []
        ];

        $query = $this->getQuery();
        $response = $this->getCount($query, $response);

        $data = $query
                    ->limit(10)
                    ->offset($request->start)
                    ->orderBy('community_feeds.id', 'desc')
                    ->get();

        $response['data'] = $data->map(function ($feed) {

            $category = Category::find($feed->category_id);
            $feed->category = ($category != null ? $category->category : '');
            $feed->statusText = $feed->status;
            $feed->status = Str::replace('accepted', 'approved', $feed->status);
            $feed->status = "<span class='{$feed->status}'>".Str::ucfirst($feed->status)."</span>";
            
            return $feed;
        });

        return response()->json($response);
    }

    private function getQuery(): Builder
    {
        return DB::table('community_feeds')
                    ->join('users', 'users.id', 'community_feeds.user_id')
                    ->select(
                        'community_feeds.*',
                        'users.user_name'
                    );
    }

    private function getCount(Builder $query, array $response): array
    {
        $response['recordsTotal'] = $query->count();
        $response['recordsFiltered'] = $response['recordsTotal'];

        return $response;
    }
}
