<?php

namespace App\Actions\User;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;

class GetCurrentLogged
{
    use AsAction;

    public function getControllerMiddleware(): array
    {
        return ['auth:api'];
    }

    public function handle(Request $request): JsonResponse
    {
        return Response::json($request->user());
    }
}
