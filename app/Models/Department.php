<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    // A department can have many users
    public function users() {
        return $this->hasMany(User::class);
    }
}

