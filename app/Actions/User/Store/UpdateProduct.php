<?php

namespace App\Actions\User\Store;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;

class UpdateProduct
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
                'unique:products,name,'.$request->product.',id,store_id,'.$request->store // unique product-name only this store
            ],
            'price' => 'required|numeric|min:1'
        ];
    }

    public function handle(Request $request, string $store, string $product): JsonResponse
    {
        $data = $request->user()
            ->stores()
            ->findOrFail($store)
            ->products()
            ->findOrFail($product);

        return Response::json( $data->update($request->all()) );
    }
}
