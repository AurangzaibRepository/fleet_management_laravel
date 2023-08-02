<?php

namespace App\Models;

use App\DataProviders\VehicleProvider;
use App\Transformers\VehicleTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = null;
}
