<?php

namespace App\Actions\User\Store;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;

class DestroyProduct
{
    use AsAction;

    public function getControllerMiddleware(): array
    {
        return ['auth:api'];
    }

    public function handle(Request $request, string $store, string $product): JsonResponse
    {
        $data = $request->user()
            ->stores()
            ->findOrFail($store)
            ->products()
            ->findOrFail($product);

        return Response::json($data->delete());
    }
}
