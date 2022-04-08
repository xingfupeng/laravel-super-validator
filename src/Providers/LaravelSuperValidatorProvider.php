<?php

namespace Xingfupeng\LaravelSuperValidator\Providers;

use Illuminate\Support\ServiceProvider;
use Xingfupeng\LaravelSuperValidator\Support\ValidatorHandler;

class LaravelSuperValidatorProvider extends ServiceProvider
{
    /**
     * 超级校验的名称
     *
     * @var string
     */
    private $name = 'laravel_super_validator';
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
            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'config.php' => config_path($this->name . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'config.php', $this->name
        );
        $this->publishes([
            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'fields.php' => config_path($this->name . '_fields.php'),
        ], 'config');
        $this->mergeConfigFrom(
            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'fields.php', $this->name . '_fields'
        );
        app(ValidatorHandler::class)->validate();
    }
}
