<?php
return [
    'id' => [
        'rules' => [
            'id' => 'required|integer',
        ],
        'message' => [
            'id.required' => 'ID不能为空',
            'id.integer' => 'ID必须是数字',
        ]
    ],
    'name' => [
        'rules' => [
            'id' => 'required|integer',
        ],
        'message' => [
            'id.required' => '姓名不能为空',
            'id.integer' => '姓名必须是数字',
        ]
    ],
];