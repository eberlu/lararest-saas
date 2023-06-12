<?php

namespace App\Actions\User\Store;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;

class UpdateCategory
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
                'unique:categories,name,'.$request->category.',id,store_id,'.$request->store // unique category-name only this store
            ],
        ];
    }

    public function handle(Request $request, string $store, string $category): JsonResponse
    {
        $data = $request->user()
            ->stores()
            ->findOrFail($store)
            ->categories()
            ->findOrFail($category);

        return Response::json( $data->update($request->all()) );
    }
}
