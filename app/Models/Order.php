<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // An order belongs to a user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // An order can have many photos (evidence of delivery)
    public function photos() {
        return $this->hasMany(Photo::class);
    }
}
