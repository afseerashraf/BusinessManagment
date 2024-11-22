<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function expense(){
        return $this->hasOne(Expense::class);
    }
}
