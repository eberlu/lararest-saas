<?php

namespace App\Actions\User\Store;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;

class ShowCategory
{
    use AsAction;

    public function getControllerMiddleware(): array
    {
        return ['auth:api'];
    }

    public function handle(Request $request, string $store, string $category): JsonResponse
    {
        return Response::json(
            $request->user()
            ->stores()->findOrFail($store)
            ->categories()
            ->findOrFail($category)
        );
    }
}
