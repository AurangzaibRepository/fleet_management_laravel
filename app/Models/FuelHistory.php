<?php

namespace App\Models;

use App\DataProviders\FuelHistoryProvider;
use App\Transformers\FuelHistoryTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelHistory extends Model
{
    use HasFactory;

    protected $table = null;
}
