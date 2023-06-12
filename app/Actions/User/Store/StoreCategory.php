<?php

namespace App\Actions\User\Store;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;

class StoreCategory
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
                'unique:categories,name,NULL,id,store_id,'.$request->store // unique category-name only this store
            ],
        ];
    }

    public function handle(Request $request, string $store): JsonResponse
    {
        return Response::json(
            $request->user()
            ->stores()
            ->findOrFail($store)
            ->categories()
            ->create($request->all())
        );
    }
}
