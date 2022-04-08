<?php
return [
    'id' => [
        'rules' => 'required|integer',
        'messages' => [
            'required' => 'ID不能为空',
            'integer' => 'ID必须是数字',
        ]
    ],
    'name' => [
        'rules' => 'required|integer',
        'messages' => [
            'required' => '姓名不能为空',
            'integer' => '姓名必须是数字',
        ]
    ],
];