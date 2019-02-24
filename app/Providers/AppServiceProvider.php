<?php
namespace App\Providers;
use App\Models\Contacts\Contact;
use App\Models\Navigation\Element;
use App\Models\Settings\Setting;
use App\Models\SocialLinks\SocialLink;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
