<?php

namespace App\Actions\Admin;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Response;

class Login
{
    use AsAction;

    public function handle(Request $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (! $token = auth('admin')->attempt($credentials)) 
            return Response::json('Unathorized', 401);

        return Response::json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
