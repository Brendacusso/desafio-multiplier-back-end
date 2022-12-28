<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    protected $table = 'orders_items';

    public function orderId() {
        return $this->belongsTo(Order::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function orderItem() {
        return $this->belongsTo(Menu::class);
    }
}
