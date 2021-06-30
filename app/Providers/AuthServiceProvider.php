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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->gateCategory();
        $this->gateProduct();
        $this->gateSlide();
        $this->gateUser();
        $this->gateRole();
        $this->gateIndexAdmin();
    }
    public function gateIndexAdmin(){
        Gate::define('index_admin', function(User $user){
            return $user->checkPermissionAccess('page_admin');
        });
    }
    public function gateCategory(){
        Gate::define('list_category','App\Policies\CategoryPolicy@view');
        Gate::define('create_category','App\Policies\CategoryPolicy@create');
        Gate::define('update_category','App\Policies\CategoryPolicy@update');
        Gate::define('delete_category','App\Policies\CategoryPolicy@delete');
    }
    public function gateProduct(){
        Gate::define('list_product','App\Policies\ProductPolicy@view');
        Gate::define('create_product','App\Policies\ProductPolicy@create');
        Gate::define('update_product','App\Policies\ProductPolicy@update');
        Gate::define('delete_product','App\Policies\ProductPolicy@delete');
    }
    public function gateSlide(){
        Gate::define('list_slide','App\Policies\SlidePolicy@view');
        Gate::define('create_slide','App\Policies\SlidePolicy@create');
        Gate::define('update_slide','App\Policies\SlidePolicy@update');
        Gate::define('delete_slide','App\Policies\SlidePolicy@delete');
    }
    public function gateUser(){
        Gate::define('list_user','App\Policies\UserPolicy@view');
        Gate::define('create_user','App\Policies\UserPolicy@create');
        Gate::define('update_user','App\Policies\UserPolicy@update');
        Gate::define('delete_user','App\Policies\UserPolicy@delete');
    }
    public function gateRole(){
        Gate::define('list_role','App\Policies\RolePolicy@view');
        Gate::define('create_role','App\Policies\RolePolicy@create');
        Gate::define('update_role','App\Policies\RolePolicy@update');
        Gate::define('delete_role','App\Policies\RolePolicy@delete');
    }
}
