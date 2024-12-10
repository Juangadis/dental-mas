<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TreatmentRepositoryInterface;
use App\Repositories\TreatmentRepository;
use App\Services\TreatmentServiceInterface;
use App\Services\TreatmentService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TreatmentRepositoryInterface::class, TreatmentRepository::class);
        $this->app->bind(TreatmentServiceInterface::class, TreatmentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
