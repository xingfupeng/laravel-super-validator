<?php
namespace Xingfupeng\LaravelSuperValidator\Support;

use Illuminate\Support\Facades\Validator;

class ValidatorHandler
{
    /**
     * 请求的所有参数
     *
     * @var [array]
     */
    public $input = [];

    /**
     * 场景名称
     * 即控制器行为名称
     *
     * @var [string|null]
     */
    public $scene = null;

    public function __construct()
    {
        $this->input = app('request')->input();
        $this->scene = app('router')->getRoutes()->match(app('request'))->getActionName();
    }

    /**
     * 开始校验
     *
     * @return void
     */
    public function validate()
    {
        $validatePattern = config('laravel_super_validator.validate_pattern');
        if (1 === $validatePattern) {
            $this->globalValidate();
        }

        if (2 === $validatePattern) {
            $this->scenesValidate();
        }

        if (3 == $validatePattern) {
            $this->scenesValidate();
            $this->globalValidate();
        }

        if (4 === $validatePattern) {
            $this->globalValidate();
            $this->scenesValidate();
        }
    }

    /**
     * 全局校验
     *
     * @return void
     */
    public function globalValidate()
    {
        $rules = [];
        $messages = [];
        foreach ($this->input as $field => $value) {
            $rules[$field] = config('laravel_super_validator_fields.' . $field . '.rules');
            foreach (config('laravel_super_validator_fields.' . $field . '.messages') as $rule => $message) {
                $messages[$field . '.' . $rule] = $message;
            }
        }
        $validator = Validator::make($this->input, $rules, $messages);
        $errors = $validator->errors();
        dd($this->input, $validator->fails(), get_class_methods($validator), $errors);
    }

    /**
     * 场景校验
     *
     * @return void
     */
    public function scenesValidate()
    {

    }
}