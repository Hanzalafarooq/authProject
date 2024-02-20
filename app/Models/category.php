<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
           protected $table = 'categories';

    //  protected $fillable = [
    //     'category_name',
    // ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function subcategory()
    {
        return $this->hasMany(Subcategory::class, 'category_id', 'id');
    }
}
