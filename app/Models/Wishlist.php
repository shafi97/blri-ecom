<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory, HasUuid;
    protected $guarded      = ["uuid"];
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';
    public    $incrementing = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_uuid', 'uuid');
    }
}
