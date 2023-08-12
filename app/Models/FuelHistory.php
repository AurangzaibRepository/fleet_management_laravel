<?php

namespace App\Models;

use App\DataProviders\FuelHistoryProvider;
use App\Transformers\FuelHistoryTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class FuelHistory extends Model
{
    use HasFactory;

    protected $table = null;

    public function __construct(
        private FuelHistoryProvider $provider,
        private FuelHistoryTransformer $transformer,
    ) {
    }

    public function getListing(): JsonResponse
    {
        $data = $this->provider->fetchList();
        $transformedData = $this->transformer->transformList($data);

        return response()->json($transformedData);
    }

    public function getDetails(int $id): array
    {
        $data = $this->provider->fetchDetails($id);

        return $data;
    }
}
