<?php

namespace App\Applications\Authentication\Http\Requests;

use Dingo\Api\Http\FormRequest;

class BaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
}