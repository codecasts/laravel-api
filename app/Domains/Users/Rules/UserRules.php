<?php

namespace App\Domains\Users\Rules;

use Artesaos\Shield\Rules;

class UserRules extends Rules
{
    public function defaultRules()
    {
        return [
            'name' => 'required|min:6',
        ];
    }

    public function creating()
    {
        return $this->returnRules([
            'email' => 'required|email',
        ]);
    }

    public function updating()
    {
        return $this->returnRules([
            'email' => 'email',
        ]);
    }

    public function credentials()
    {
        return [
            'email' =>  'required|email',
            'password' => 'required',
        ];
    }

    public function register()
    {
        return $this->returnRules([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    }
}
