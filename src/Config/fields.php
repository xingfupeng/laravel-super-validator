<?php
return [
    'id' => [
        'rules' => 'integer',
        'messages' => [
            'required' => '请输入ID',
            'integer' => 'ID必须是数字',
        ]
    ],
    'page' => [
        'rules' => 'integer',
        'messages' => [
            'required' => '请输入分页',
            'integer' => '页数必须是数字',
        ]
    ],
];