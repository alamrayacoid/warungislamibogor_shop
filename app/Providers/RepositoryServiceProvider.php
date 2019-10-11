<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\LanRepository;
use App\Interfaces\LanInterface;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            LanInterface::class,
            LanRepository::class
        );
    }

}