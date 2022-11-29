<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class sendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    protected $emailcontent;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details,$emailcontent)
    {
        // dd($emailcontent['title']);
        $this->details = $details;
        $this->emailcontent = $emailcontent;
        $this->text = $emailcontent['text'];
        $this->title = $emailcontent['title'];
        $this->userName = $emailcontent['userName'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send( 'emails.otpverify', $data=['title'=>$this->emailcontent['title'], 'text'=>$this->emailcontent['text'], 'userName'=>$this->emailcontent['userName']], function( $message )
        {
            $message->to($this->details['email'],$this->details['username'])->from( 'admin@admin.com', 'Admin' )->subject($this->details['subject']);
        });
    }
}
