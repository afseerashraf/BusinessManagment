<?php

namespace App\Jobs;

use App\Mail\InvoiceDownload;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class InvoiceDownloadMail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $invoiceCustomer;

    public $pdfPath;

    public function __construct($invoiceCustomer, $pdfPath)
    {
        $this->invoiceCustomer = $invoiceCustomer;
        $this->pdfPath = $pdfPath;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        Mail::to($this->invoiceCustomer->customers->email)->send(new InvoiceDownload($this->invoiceCustomer, $this->pdfPath));

    }
}
