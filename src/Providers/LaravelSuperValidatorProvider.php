<?php

namespace Xingfupeng\LaravelSuperValidator\Providers;

use Illuminate\Support\ServiceProvider;
use Xingfupeng\LaravelSuperValidator\Support\ValidatorHandler;

class LaravelSuperValidatorProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'config.php' => config_path('laravel_super_validator.php'),
        ], 'config');
        $this->mergeConfigFrom(
            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'config.php', 'laravel_super_validator'
        );
        $this->publishes([
            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'fields.php' => config_path('laravel_super_validator_fields.php'),
        ], 'config');
        $this->mergeConfigFrom(
            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'fields.php', 'laravel_super_validator_fields'
        );
        $this->publishes([
            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'scenes.php' => config_path('laravel_super_validator_scenes.php'),
        ], 'config');
        $this->mergeConfigFrom(
            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'scenes.php', 'laravel_super_validator_scenes'
        );
        app(ValidatorHandler::class, [$this])->validate();
    }
}
