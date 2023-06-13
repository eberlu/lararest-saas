<?php

namespace App\Actions\User\Store;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;

class StoreProduct
{
    use AsAction;

    public function getControllerMiddleware(): array
    {
        return ['auth:api'];
    }

    public function rules(Request $request): array
    {
        return [       
            'name' => [
                'required',
                'unique:products,name,NULL,id,store_id,'.$request->store // unique product-name only this store
            ],
            'price' => 'required|numeric|min:1'
        ];
    }

    public function handle(Request $request, string $store): JsonResponse
    {
        return Response::json(
            $request->user()
                ->stores()
                ->findOrFail($store)
                ->products()
                ->create($request->all())
        );
    }
}
