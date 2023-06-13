<?php

namespace App\Actions\User\Store;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;

class ShowProduct
{
    use AsAction;

    public function getControllerMiddleware(): array
    {
        return ['auth:api'];
    }

    public function handle(Request $request, string $store, string $product): JsonResponse
    {
        return Response::json(
            $request->user()
            ->stores()->findOrFail($store)
            ->products()
            ->findOrFail($product)
        );
    }
}
