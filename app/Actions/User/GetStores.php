<?php

namespace App\Actions\User;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Response;

class GetStores
{
    use AsAction;

    public function getControllerMiddleware(): array
    {
        return ['auth:api'];
    }

    public function handle(Request $request): JsonResponse
    {
        return Response::json($request->user()->stores);
    }
}
