<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $guarded = ['id'];
    public function logo()
    {
        return asset('storage/' . $this->logo);
    }
}
