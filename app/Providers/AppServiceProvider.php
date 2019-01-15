<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Setting;
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
    View::share('setting', Setting::find(1));
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
