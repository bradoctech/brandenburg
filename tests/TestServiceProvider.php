<?php

namespace bradoctech\Brandenburg\Test;

use Gate;
use Route;
use Illuminate\Routing\Router;
use bradoctech\Brandenburg\Policy;
use bradoctech\Brandenburg\Permission;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;
use bradoctech\Brandenburg\Traits\ValidatesPermissions;

class TestServiceProvider extends ServiceProvider
{
    use ValidatesPermissions;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router, Kernel $kernel)
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPermissions();
    }

    /**
     * Register default package related permissions
     *
     * @return void
     */
    private function registerPermissions()
    {
        collect([
            'articles_publish',
            'articles_draft',
        ])->map(function ($permission) {
            Gate::define($permission, function ($user) use ($permission) {
                if ($this->nobodyHasAccess($permission)) {
                    return true;
                }

                return $user->hasRoleWithPermission($permission);
            });
        });
    }
}
