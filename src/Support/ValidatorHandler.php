<?php
namespace Xingfupeng\LaravelSuperValidator\Support;
class ValidatorHandler
{
    public function validate()
    {
        // dd("validate");
        dd(config('laravel_super_validator.validate_pattern'), config('laravel_super_validator_fields'));
        // $request = app('request');
        // $actionName = app('router')->getRoutes()->match($request)->getActionName();
        // $rules = 
        // $input = $request->input();
        // $rules = [
        //     'id' => 'required|integer',
        //     'name' => 'required|integer',
        // ];
        // $messages = [
        //     'id.required' => 'ID不能为空',
        //     'id.integer' => 'ID必须是数字',
        //     'name.required' => 'name不能为空',
        //     'name.integer' => 'name必须是数字',
        // ];
        // $validator = Validator::make($input, $rules, $messages);
        // $errors = $validator->errors();
        // dd($validator, $errors);
    }
}