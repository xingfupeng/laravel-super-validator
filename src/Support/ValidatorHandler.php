<?php
namespace Xingfupeng\LaravelSuperValidator\Support;

use Illuminate\Support\Facades\Validator;
use Xingfupeng\LaravelSuperValidator\Exceptions\LarvelSuperValidatorException;

class ValidatorHandler
{
    /**
     * 请求的所有参数
     *
     * @var [array]
     */
    public $input = [];

    /**
     * 参数规则
     *
     * @var array
     */
    public $rules = [];

    /**
     * 提示信息
     *
     * @var array
     */
    public $messages = [];

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
            $this->globalValidate()->execute();
        }

        if (2 === $validatePattern) {
            $this->scenesValidate()->execute();
        }

        if (3 == $validatePattern) {
            $this->scenesValidate()->execute();
            $this->globalValidate()->execute();
        }

        if (4 === $validatePattern) {
            $this->globalValidate()->execute();
            $this->scenesValidate()->execute();
        }
    }

    /**
     * 全局校验
     *
     * @return object
     */
    public function globalValidate()
    {
        $fields = array_keys($this->input);
        foreach ($fields as $field) {
            $fieldRules = config('laravel_super_validator_fields.' . $field . '.rules');
            if (is_null($fieldRules)) {
                // 避免客户端传递非配置中的参数进行非预期的校验
                continue;
            }
            $this->rules[$field] = $fieldRules;
            foreach (config('laravel_super_validator_fields.' . $field . '.messages') as $rule => $message) {
                $this->messages[$field . '.' . $rule] = $message;
            }
        }
        return $this;
    }

    /**
     * 场景校验
     *
     * @return object
     */
    public function scenesValidate()
    {
        // 闭包不进行校验直接返回
        if ($this->scene == 'Closure') {
            return $this;
        }
        $scene = config('laravel_super_validator_scenes.' . $this->scene);
        foreach ($scene as $field => $config) {
            $this->rules[$field] = $config['rules'];
            foreach ($config['messages'] as $rule => $message) {
                $this->messages[$field . '.' . $rule] = $message;
            }
        }
        return $this;
    }

    /**
     * 执行校验
     *
     * @return void
     */
    public function execute()
    {
        $validator = Validator::make($this->input, $this->rules, $this->messages);
        if ($validator->fails()) {
            throw new LarvelSuperValidatorException($validator->errors());
        }
    }
}