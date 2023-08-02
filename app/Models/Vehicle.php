<?php

namespace App\Models;

use App\DataProviders\VehicleProvider;
use App\Transformers\VehicleTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = null;

    public function __construct(
        private VehicleProvider $provider,
        private VehicleTransformer $transformer,
    ) {
    }

    public function getListing(): JsonResponse
    {
        $data = $this->provider->fetchList();
        $transformedData = $this->transformer->transformList($data);

        return response()->json($transformedData);
    }

    public function getDetails(int $id): object
    {
        $data = $this->provider->fetchDetails($id);

        return $data;
    }
}
