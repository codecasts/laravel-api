<?php

namespace App\Applications\Authentication\Http\Requests;

use App\Domains\Users\User;

class RegisterRequest extends BaseRequest
{
    public function rules()
    {
        return User::rules()->register();
    }
}