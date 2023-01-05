<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\PromoCodeMail;
use Illuminate\Support\Facades\Mail;

class PromoCodeJob implements ShouldQueue
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
        $this->description = $emailcontent['description'];
        $this->code = $emailcontent['code'];
        $this->end_date = $emailcontent['end_date'];
        $this->images = $emailcontent['images'];
        $this->userName = $emailcontent['userName'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('emails.PromoCode', $data = [
            'userName' => $this->details['userName'],
            'description' => $this->emailcontent['description'],
            'code' => $this->emailcontent['code'],
            'end_date' => $this->emailcontent['end_date'],
            'images' => $this->emailcontent['images']
        ], function ($message) {
            $message->to($this->details['email'], $this->details['username'])->from('admin@admin.com', 'Admin')->subject($this->details['subject']);
        });
    }
}
