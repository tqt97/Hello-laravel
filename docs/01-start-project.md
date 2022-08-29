<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

1.  #### Create new project with latest version:

    In this project use **Laravel** _v9.26.1_ - **PHP** _v8.1.4_

        composer create-project laravel/laravel <project_name>
        cd <project_name>
        php artisan serve

    In browser visit: [**http://127.0.0.1:8000**](http://127.0.0.1:8000/)
2.  #### Install package authentication ([Breeze](https://laravel.com/docs/9.x/starter-kits#laravel-breeze-installation), [Jetstream](https://jetstream.laravel.com/))

    In this project use Laravel **Jetstream**

        composer require laravel/jetstream
        php artisan jetstream:install livewire
        npm install
        npm run build
        php artisan migrate

        php artisan optimize:clear   ## clear all config, cache, view
        ## open new terminal
        npm run dev   ## run Vite - refresh page every change

    ##### Enabling Profile Photos

    Goto _config/jetstream.php_ and **enable** the feature

        use Laravel\Jetstream\Features;

        'features' => [
            // Features::termsAndPrivacyPolicy(),
            Features::profilePhotos(),
            // Features::api(),
            // Features::teams(['invitations' => true]),
            Features::accountDeletion(),
        ],

    Run command: **php artisan storage:link**
    If show image error check __APP_URL__ in env and edit (APP_URL=http://localhost:_8000_)
