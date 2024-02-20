<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    public function order()
    {
        return $this->belongsTo(order::class, 'order_id', 'id');
    }
    protected $fillable = [
        'quantity', 'price', 'subtotal',
    ];
    public function product()
    {
        return $this->belongsTo(product::class, 'item_id', 'id');
    }

}
