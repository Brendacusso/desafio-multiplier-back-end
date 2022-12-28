<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    public function orderItems() {
        return $this->hasMany(Order_items::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function table() {
        return $this->belongsTo(Table::class);
    }

    /*public function user() {
        return $this->belongsTo(User::class)->where('role', 'waiter');
    }*/

}
