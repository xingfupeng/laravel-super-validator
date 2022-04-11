<?php
return [
    'App\Http\Controllers\ValidationController@index' => [
        'id' => [
            'rules' => 'required|min:3|max:6',
            'messages' => [
                'required' => 'ID不能为空',
                'min' => 'id不能少于:min个字符',
                'max' => 'id不能多于:max个字符'
            ]
        ],
        'page' => [
            'rules' => 'required',
        ]
    ],
];