<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

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
        VerifyEmail::toMailUsing(function ($notifiable,$url){
            return (new MailMessage)
                ->subject('Verificar Cuenta')
                ->greeting('Hola!')
                ->line('Tu cuenta ya esta casi lista solo debes presionar el enlace a continuacion.')
                ->action('Verifica tu Cuenta', $url)
                ->line('Si no creó una cuenta, ignore este mensaje.');
        });
    }
}
