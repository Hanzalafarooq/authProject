<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    use HasFactory;
           protected $table = 'subcategories';

     protected $fillable = [
        'subcategory_name',
    ];
      public function category()
    {
        return $this->hasOne(category::class, 'id','category_id');
        //   first pe category table ki id or  fiir subcategory ki id or ye dono equal han ye mtlb ha
    }

}