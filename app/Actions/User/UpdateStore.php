<?php

namespace App\Actions\User;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Response;

class UpdateStore
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
                'unique:stores,name,'.$request->store.',id,user_id,'.$request->user// unique store-name only user(owner)
            ],
        ];
    }

    public function handle(Request $request, string $user, string $store): JsonResponse
    {
        $data = $request->user()->stores()->findOrFail($store);

        return Response::json( $data->update($request->all()) );
    }
}
