<?php

namespace App\Providers;

use App\Models\EmailConfiguration;
use App\Models\GeneralSetting;
use App\Models\LogoSetting;
use App\Models\Pushersetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrap();

        $generalSetting = GeneralSetting::first();
        $logoSetting = LogoSetting::first();
        $mailSetting = EmailConfiguration::first();
        $pusherSetting = Pushersetting::first();

        /** set time zone */
        Config::set('app.timezone', $generalSetting->time_zone);

        /** set mail config */
        Config::set('mail.mailers.smtp.host', $mailSetting->host);
        Config::set('mail.mailers.smtp.port', $mailSetting->port);
        Config::set('mail.mailers.smtp.encryption', $mailSetting->encryption);
        Config::set('mail.mailers.smtp.username', $mailSetting->username);
        Config::set('mail.mailers.smtp.password', $mailSetting->password);

        /** Share variable at all view */
        View::composer('*', function($view) use ($generalSetting, $logoSetting){
            $view->with(['settings' => $generalSetting, 'logoSetting' => $logoSetting]);
        });

        /** Set Broadcasting Config */
        Config::set('broadcasting.connections.pusher.key', $pusherSetting->pusher_key);
        Config::set('broadcasting.connections.pusher.secret', $pusherSetting->pusher_secret);
        Config::set('broadcasting.connections.pusher.app_id', $pusherSetting->pusher_app_id);
        Config::set('broadcasting.connections.pusher.options.host', "api-".$pusherSetting->pusher_cluster.".pusher.com");

        //dd(Config::get('broadcasting'));

        /** Share variable at all view */
        View::composer('*', function($view) use ($generalSetting, $logoSetting, $pusherSetting){
            $view->with(['settings' => $generalSetting, 'logoSetting' => $logoSetting, 'pusherSetting' => $pusherSetting]);
        });
    








         // Define la URL base de tu aplicación
         $appUrl = URL::to('/');

         // Configura la vista de correo electrónico
         Config::set('mail.markdown', [
             'theme' => 'default',
             'paths' => [
                 resource_path('views/emails'), // Ruta de la carpeta donde guardaste la plantilla de correo
             ],
         ]);
 
         // Comparte la variable de la URL base y la configuración de correo electrónico con todas las vistas
         View::composer('*', function($view) use ($generalSetting, $logoSetting, $pusherSetting, $appUrl) {
             $view->with([
                 'settings' => $generalSetting,
                 'logoSetting' => $logoSetting,
                 'pusherSetting' => $pusherSetting,
                 'appUrl' => $appUrl, // Pasa la URL base a todas las vistas
             ]);
         });
 
    }
}
