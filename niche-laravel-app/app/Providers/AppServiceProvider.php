<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable) {
            $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

            $notifiable->verification_code = $code;
            $notifiable->verification_code_expires_at = now()->addMinutes(15);
            $notifiable->save();

            return (new MailMessage())
                ->subject('Verify Your Email')
                ->line('Use the 6-digit code below to verify your email address:')
                ->line("**{$code}**")
                ->line('This code will expire in 15 minutes.');
        });
    }
}
