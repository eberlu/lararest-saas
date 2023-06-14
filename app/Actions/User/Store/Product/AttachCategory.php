<?php

namespace App\Actions\User\Store\Product;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;

class AttachCategory
{
    use AsAction;

    public function getControllerMiddleware(): array
    {
        return ['auth:api'];
    }

    public function handle(Request $request, string $store, string $product, string $category): JsonResponse
    {
        $request->user()
            ->stores()
            ->findOrFail($store)
            ->products()
            ->findOrFail($product)
            ->categories()
            ->attach($category);

        return Response::json('attached');
    }
}
