<?php

namespace App\Observers;

use App\Mail\CreateCustomer;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

class CustomerCreate
{
    /**
     * Handle the Customer "created" event.
     */
    public function created(Customer $customer): void
    {
        Mail::to($customer->email)->send(new CreateCustomer($customer));
    }

    /**
     * Handle the Customer "updated" event.
     */
    public function updated(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void {}

    /**
     * Handle the Customer "restored" event.
     */
    public function restored(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "force deleted" event.
     */
    public function forceDeleted(Customer $customer): void
    {
        //
    }
}
