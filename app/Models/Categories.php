<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class categories extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'category_name',
        'category_description',        
    ];
}
