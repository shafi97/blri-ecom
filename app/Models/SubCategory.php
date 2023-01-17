<?php

namespace App\Models;

use App\Models\Traits\Hasid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes, Hasid;
    protected $guarded = ["id"];

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }
}
