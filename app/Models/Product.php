<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'category_id',
        
    ];
    // public function categories()
    // {
    //     return $this->belongsTo(categories::class);
    // }
    public function category(): BelongsTo
    {
        return $this->belongsTo(categories::class);
    }
}
