<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Date;

class Invoice extends Model
{
    use Notifiable;

    
    protected $guarded = [];
    protected $table = 'invoices';


    protected function status():Attribute{
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn(string $value) => ucfirst($value),
        );
    }

    
    public function customers(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }



}
