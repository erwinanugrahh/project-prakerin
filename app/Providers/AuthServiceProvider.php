<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        Gate::define('kenaikan-kelas', function($user = null){
            return setting('setting_ppdb')['kenaikan_kelas']=="true";
        });
        Gate::define('smk', function($user = null){
            return setting('setting_web')['website_for']=='smk';
        });
        Gate::define('open-pengumuman', function($user = null){
            return setting('setting_ppdb')['open_pengumuman']=='true';
        });
        Gate::define('open-ppdb', function($user = null){
            return setting('setting_ppdb')['open_ppdb']=='true';
        });
    }
}
