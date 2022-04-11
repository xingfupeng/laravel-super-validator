# laravel-super-validator

#### 组件介绍
在 Laravel 开发过程中，你是否会因为过多的参数校验而苦恼。laravel-super-validation 会帮助你实现场景参数校验、公共参数校验或者智能参数校验模式。从来轻松解决参数校验的苦恼。而且还可以达到很好的解耦效果。

#### 校验思想
组件内置很多通用字段校验，默认规则非必填，但会按照既定的格式进行校验。<br />
当客户端传递过来的时候，会根据预设的判定规则进行判断，没有传递时参数时不进行判定。<br /><br />
例如 : id 校验规则必须是整数。默认情况下客户端不传递参数则不校验。当客户端传递 id 字段的时候则按照整数的规则校验。<br />
      email 同理当客户端传递 email 字段便会按照邮箱的格式校验，否则不校验。<br />
这样一来在控制器层面不需要写过多的参数校验。<br /><br />
组件支持场景校验，当用户用邮箱登录的时候，场景中定义邮箱字段为必填，与内置的校验规则合并一起校验。<br />
场景设定的规则是控制器的命名空间类名加方法名。<br />
例如 : App\Http\Controllers\ValidationController@index<br />


#### 安装教程

1.  安装
    ```sh
    composer require xingfupeng/laravel-super-validator
    ```
2.  发布配置文件
    ```sh
    php artisan vendor:publish --tag=config --force
    ```
3.  添加服务器提供者配置
    ```php
    'providers' => [
        ...
        Xingfupeng\LaravelSuperValidator\Providers\LaravelSuperValidatorProvider::class,

    ],
    ```


#### 使用说明

1.  参数配置
    config/laravel_super_validator.php 的配置项可以覆盖 laravel_super_validator中的配置项
2.  xxxx
3.  xxxx

#### 参与贡献

1.  Fork 本仓库
2.  新建 Feat_xxx 分支
3.  提交代码
4.  新建 Pull Request


#### 内置校验
```php
return [
    'id' => [
        'rules' => 'integer',
        'messages' => [
            'integer' => 'ID必须是数字',
        ]
    ],
    'page' => [
        'rules' => 'integer',
        'messages' => [
            'integer' => '页数必须是数字',
        ]
    ],
];
```