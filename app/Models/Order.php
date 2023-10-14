<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detail() {
        return $this->hasMany(Order_detail::class, 'order_id');
    }
}