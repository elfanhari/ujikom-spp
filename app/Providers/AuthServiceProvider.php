<?php

namespace App\Providers;

use App\Models\LoginSession;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->app['auth']->viaRequest('web', function ($request) {
            // Periksa apakah user telah login dari sesi sebelumnya
            $sessionId = $request->session()->getId();
            $loginSession = LoginSession::where('session_id', $sessionId)->first();

            if ($loginSession && $user = $loginSession->user) {
                Auth::login($user);
                return $user;
            }

            return null;
        });
    }
}
