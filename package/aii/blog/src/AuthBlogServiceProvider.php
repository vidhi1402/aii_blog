<?php

namespace Aii\Blog;

use Aii\Blog\Models\AdminPermission;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthBlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        foreach ($this->getAdminPermissions() as $permission) {

            $gate->define($permission->name, function ($user) use ($permission) {

                return $user->hasPermission($permission);
            });
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    protected function getAdminPermissions()
    {
        return AdminPermission::with('roles')->get();
    }

    public function register()
    {
        //
    }
}
