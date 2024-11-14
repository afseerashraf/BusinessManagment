<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $guarded = [];

    public function expense(){
        return $this->hasOne(Expenses::class);
    }
}
