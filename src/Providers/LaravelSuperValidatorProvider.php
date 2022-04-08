<?php

namespace Xingfupeng\LaravelSuperValidator\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

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
        $request = app('request');
        $actionName = app('router')->getRoutes()->match($request)->getActionName();
        $rules = 
        $input = $request->input();
        $rules = [
            'id' => 'required|integer',
            'name' => 'required|integer',
        ];
        $messages = [
            'id.required' => 'ID不能为空',
            'id.integer' => 'ID必须是数字',
            'name.required' => 'name不能为空',
            'name.integer' => 'name必须是数字',
        ];
        $validator = Validator::make($input, $rules, $messages);
        $errors = $validator->errors();
        dd($validator, $errors);
    }
}
