<?php

namespace App\Models;

use App\DataProviders\VendorProvider;
use App\Transformers\VendorTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class Vendor extends Model
{
    use HasFactory;

    protected $table = null;

    public function __construct(
        private VendorProvider $provider,
        private VendorTransformer $transformer,
    ) {
    }

    public function getListing(): JsonResponse
    {
        $data = $this->provider->fetchList();
        $transformedData = $this->transformer->transformList($data);

        return response()->json($transformedData);
    }
}
