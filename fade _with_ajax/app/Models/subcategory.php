<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class subcategory extends Model
{
    use HasFactory;

    function rel_to_category(){
       return $this->belongsTo(Category::class,'category_id');
    }
}
