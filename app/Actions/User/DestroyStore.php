<?php

namespace App\Actions\User;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;

class DestroyStore
{
    use AsAction;

    public function getControllerMiddleware(): array
    {
        return ['auth:api'];
    }

    public function handle(Request $request, string $user, string $store): JsonResponse
    {
        $data = $request->user()->stores()->findOrFail($store);

        return Response::json($data->delete());
    }
}
