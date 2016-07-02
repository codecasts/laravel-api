<?php

namespace App\Applications\Authentication\Http\Controllers;


use App\Applications\Authentication\Http\Requests\RegisterRequest;
use App\Domains\Users\Contracts\UsersRepository;
use Tymon\JWTAuth\JWTAuth;

class RegisterController extends BaseController
{
    /**
     * @var UsersRepository
     */
    protected $repository;

    public function __construct(UsersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register(RegisterRequest $request, UsersRepository $repository, JWTAuth $auth)
    {
        try {
            $user = $repository->create($request->only('name', 'email', 'password'));
        } catch (\Exception $e) {
            throw new \Exception('Unable to process your request.');
        }

        if (!$user) {
            throw new \Exception('Unable to process your request.');
        }

        $token = $auth->fromUser($user);

        return response()->json(compact('token'));
    }
}
