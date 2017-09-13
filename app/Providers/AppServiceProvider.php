<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\IntegerConversionInterface::class,
                        \App\IntegerConversion::class
                    );

        $this->app->bind(
            \League\Fractal\Serializer\Serializer::class, 
            \League\Fractal\Serializer\JsonApiSerializer::class
            );        

        $this->app->bind(
            \League\Fractal\TransformerAbstract::class,
            \App\Transformers\ConversionTransformer::class
            );        

    }
}
