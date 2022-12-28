<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory, SoftDeletes, HasUuid;
    protected $guarded = ["uuid"];

    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_uuid','uuid');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_uuid','uuid');
    }

    public function file(): hasOne
    {
        return $this->hasOne(ProductFile::class, 'product_uuid','uuid')->withDefault();
    }
    public function files()
    {
        return $this->hasMany(ProductFile::class, 'product_uuid','uuid');
    }
}
