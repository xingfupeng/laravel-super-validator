<?php
namespace Xingfupeng\LaravelSuperValidator\Exceptions;

use Exception;
use Illuminate\Http\Request;

class LarvelSuperValidatorException extends Exception
{
    /**
     * 转换异常为 HTTP 响应
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render(Request $request)
    {
        return response($this->getMessage());
    }
}