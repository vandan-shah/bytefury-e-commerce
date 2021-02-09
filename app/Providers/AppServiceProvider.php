<?php
namespace App\Providers;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::model('customer', User::class);
        View::share([
            'categories' => Category::all(),
            'brands' => Brand::orderBy('name')->get(),
            //'username'=> Auth::user()
        ]);
    }
}















