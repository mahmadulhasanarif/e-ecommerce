<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Order()
    {
        return $this->belongsTo(Order::class, 'user_id');
    }

    public function Product()
    {
        return $this->belongsTo(Product::class, 'user_id');
    }
}
