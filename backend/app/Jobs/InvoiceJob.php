<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;

class InvoiceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    protected $emailcontent;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details, $emailcontent)
    {
        $this->details = $details;
        $this->emailcontent = $emailcontent;
        $this->ProductOrderTotal = $emailcontent['ProductOrderTotal'];
        $this->PromoSum = $emailcontent['PromoSum'];
        $this->optional = $emailcontent['optional'];
        $this->street_address = $emailcontent['street_address'];
        $this->city = $emailcontent['city'];
        $this->states = $emailcontent['states'];
        $this->country = $emailcontent['country'];
        $this->zip = $emailcontent['zip'];
        $this->Subtotal = $emailcontent['Subtotal'];
        $this->invoice = $emailcontent['invoice'];
        $this->date = $emailcontent['date'];
        $this->text = $emailcontent['text'];
        $this->userName = $emailcontent['userName'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('emails.Invoice', $data = [
            'date' => $this->emailcontent['date'],
            'invoice' => $this->emailcontent['invoice'],
            'street_address' => $this->emailcontent['street_address'],
            'city' => $this->emailcontent['city'],
            'optional' => $this->emailcontent['optional'],
            'states' => $this->emailcontent['states'],
            'country' => $this->emailcontent['country'],
            'zip' => $this->emailcontent['zip'],
            'ProductOrderTotal' => $this->emailcontent['ProductOrderTotal'],
            'Subtotal' => $this->emailcontent['Subtotal'],
            'PromoSum' => $this->emailcontent['PromoSum'],
            'text' => $this->emailcontent['text'],
            'userName' => $this->emailcontent['userName']
        ], function ($message) {
            $message->to($this->details['email'], $this->details['username'])->from('admin@admin.com', 'Admin')->subject($this->details['subject']);
        });
    }
}
