<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function Shiping()
    {
        return $this->belongsTo(Shiping::class, 'shiping_id');
    }
    public function Payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
