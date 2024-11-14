<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];

    public function customers(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
