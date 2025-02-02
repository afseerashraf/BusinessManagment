<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Observers\CustomerCreate;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;

#[ObservedBy([CustomerCreate::class])]

class Customer extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];


    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => ucfirst($value),
        );
    }

    public function invoice(){
        return $this->hasOne(Invoice::class);
    }
}
