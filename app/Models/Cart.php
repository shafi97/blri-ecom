<?php

namespace App\Models;

use App\Models\Traits\Hasid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory, Hasid;
    protected $guarded = ["id"];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
