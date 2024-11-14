<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function invoice(){
        return $this->hasOne(Invoice::class);
    }
}
