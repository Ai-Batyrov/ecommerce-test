<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Auth\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Ecommerce\Domains\Auth\Repositories\UserRepository;
use Ecommerce\Domains\Auth\Requests\LoginRequest;
use Ecommerce\Domains\Auth\Requests\RegisterRequest;
use Ecommerce\Domains\Auth\Response\UserResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class Controller extends BaseController
{
    public function login(LoginRequest $request, UserRepository $repository): JsonResponse
    {
        return $this->response(
            'User is successfully authenticated.',
            UserResource::make($repository->login($request->getDto())),
            Response::HTTP_CREATED
        );
    }

    public function register(RegisterRequest $request, UserRepository $repository): JsonResponse
    {
        return $this->response(
            'User is successfully registered.',
            UserResource::make($repository->register($request->getDto())),
            Response::HTTP_CREATED
        );
    }
}