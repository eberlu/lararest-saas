<?php

namespace App\Actions\User;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Response;

class NewStore
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
                'unique:stores,name,NULL,id,user_id,'.$request->user // unique store-name only user(owner)
            ],
        ];
    }

    public function handle(Request $request)
    {
        return Response::json(
            $request->user()
            ->stores()
            ->create( $request->all() )
        );
    }
}
