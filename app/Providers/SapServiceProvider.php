<?php

namespace App\Providers;

use App\Models\Bank;
use App\Observers\BankObserver;
use App\Services\BankService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class SapServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register SAP services
        $this->app->singleton(BankService::class, function ($app) {
            return new BankService();
        });

        // Register other SAP-specific services here
        $this->registerSapServices();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Register model observers
        Bank::observe(BankObserver::class);

        // Register gates and policies
        $this->registerGates();

        // Register custom validation rules
        $this->registerValidationRules();

        // Register view composers
        $this->registerViewComposers();
    }

    /**
     * Register SAP-specific services.
     */
    private function registerSapServices(): void
    {
        // Register inventory service
        $this->app->bind('sap.inventory', function ($app) {
            return new \App\Services\InventoryService();
        });

        // Register purchase order service
        $this->app->bind('sap.purchase-order', function ($app) {
            return new \App\Services\PurchaseOrderService();
        });
    }

    /**
     * Register custom gates.
     */
    private function registerGates(): void
    {
        Gate::define('manage-banks', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('manager');
        });

        Gate::define('view-reports', function ($user) {
            return $user->hasAnyRole(['admin', 'manager', 'viewer']);
        });
    }

    /**
     * Register custom validation rules.
     */
    private function registerValidationRules(): void
    {
        \Validator::extend('bank_code', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[A-Z]{3}[0-9]{3}$/', $value);
        });

        \Validator::replacer('bank_code', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The :attribute must be in format ABC123.');
        });
    }

    /**
     * Register view composers.
     */
    private function registerViewComposers(): void
    {
        view()->composer('layouts.app', function ($view) {
            $view->with('appName', config('app.name'));
            $view->with('appVersion', '12.0.0');
        });
    }
}
