<?php
namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyApiEmail extends VerifyEmailBase
{
    /**
    * Get the verification URL for the given notifiable.
    *
    * @param mixed $notifiable
    * @return string
    */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'front.verificationapi.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            ['id' => $notifiable->getKey()]
        );
    }
}