<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**f
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
        Paginator::useBootstrap();

        Gate::define('admin', function(User $user) {
            return $user->level === 'admin';    
        });

        Gate::define('petugas', function(User $user) {
            return $user->level === 'petugas';    
        });

        Gate::define('siswa', function(User $user) {
            return $user->level === 'siswa';    
        });
        
        // LOCAL TIME
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

    }
   
}
