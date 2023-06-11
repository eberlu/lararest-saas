<?php

namespace App\Actions\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;

class GetCurrentLogged
{
    use AsAction;

    public function getControllerMiddleware(): array
    {
        return ['auth:admin'];
    }

    public function handle(Request $request): JsonResponse
    {
        return Response::json($request->user());
    }
}
