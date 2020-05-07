<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

// use App\Repositories\Contracts\UserRepository;
// use App\Repositories\Implementations\Eloquent\UserImplementation;

use App\Repositories\Contracts\PermissionRepository;
use App\Repositories\Implementations\Eloquent\PermissionImplementation;

use App\Repositories\Contracts\MahanagarRepository;
use App\Repositories\Implementations\Eloquent\MahanagarImplementation;

use App\Repositories\Contracts\DivisionRepository;
use App\Repositories\Implementations\Eloquent\DivisionImplementation;

use App\Repositories\Contracts\DistrictRepository;
use App\Repositories\Implementations\Eloquent\DistrictImplementation;

use App\Repositories\Contracts\ThanaRepository;
use App\Repositories\Implementations\Eloquent\ThanaImplementation;

use App\Repositories\Contracts\UpazillaRepository;
use App\Repositories\Implementations\Eloquent\UpazillaImplementation;

use App\Repositories\Contracts\PourashavaRepository;
use App\Repositories\Implementations\Eloquent\PourashavaImplementation;

use App\Repositories\Contracts\UnionRepository;
use App\Repositories\Implementations\Eloquent\UnionImplementation;

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
        // $this->app->singleton(UserRepository::class,UserImplementation::class);
        $this->app->singleton(PermissionRepository::class,PermissionImplementation::class);
        $this->app->singleton(MahanagarRepository::class,MahanagarImplementation::class);
        $this->app->singleton(DivisionRepository::class,DivisionImplementation::class);
        $this->app->singleton(DistrictRepository::class,DistrictImplementation::class);
        $this->app->singleton(ThanaRepository::class,ThanaImplementation::class);
        $this->app->singleton(UpazillaRepository::class,UpazillaImplementation::class);
        $this->app->singleton(PourashavaRepository::class,PourashavaImplementation::class);
        $this->app->singleton(UnionRepository::class,UnionImplementation::class);
        $this->app->singleton(MemberRepository::class,MemberImplementation::class);
    }


}
