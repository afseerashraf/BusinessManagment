<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Invoice extends Model
{
    use Notifiable;

    
    protected $guarded = [];
    protected $table = 'invoices';


    
    public function customers(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
