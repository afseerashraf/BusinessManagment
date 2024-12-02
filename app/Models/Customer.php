<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Observers\CustomerCreate;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
 
#[ObservedBy([CustomerCreate::class])]

class Customer extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    public function invoice(){
        return $this->hasOne(Invoice::class);
    }
}
