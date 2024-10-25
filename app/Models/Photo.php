<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // A photo belongs to an order
    public function order() {
        return $this->belongsTo(Order::class);
    }
}

