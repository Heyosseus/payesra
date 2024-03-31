<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Paysera\Client\TransfersClient\ClientFactory;
use Paysera\Component\RestClientCommon\Client\ApiClient;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ClientInterface::class, Client::class);
        $this->app->bind(ClientFactory::class, function ($app) {
            $apiClient = $app->make(ApiClient::class);
            return new ClientFactory($apiClient);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
