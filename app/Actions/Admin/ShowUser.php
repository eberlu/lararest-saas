<?php

namespace App\Actions\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;
use App\Models\User;

class ShowUser
{
    use AsAction;

    public function getControllerMiddleware(): array
    {
        return ['auth:admin'];
    }

    public function handle(string $user): JsonResponse
    {
        return Response::json(User::findOrFail($user));
    }
}
