<?php

namespace App\Models;

use App\DataProviders\VendorProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table = null;

    public function __construct(
        private VendorProvider $provider,
    ) {
    }
}
