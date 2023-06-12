<?php

namespace App\Actions\User\Store;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;

class DestroyCategory
{
    use AsAction;

    public function getControllerMiddleware(): array
    {
        return ['auth:api'];
    }

    public function handle(Request $request, string $store, string $category): JsonResponse
    {
        $data = $request->user()
            ->stores()
            ->findOrFail($store)
            ->categories()
            ->findOrFail($category);

        return Response::json($data->delete());
    }
}
