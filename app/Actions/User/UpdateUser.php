<?php

namespace App\Actions\User;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;
use App\Models\User;

class UpdateUser
{
    use AsAction;

    public function getControllerMiddleware(): array
    {
        return ['isCurrentUserOrAdmin'];
    }

    public function rules(Request $request): array
    {
        return [       
            'name' => 'sometimes:required',
            'email' => 'sometimes:required|unique:users,email,'.$request->user,
            'password' => 'sometimes:required|min:6|confirmed'
        ];
    }

    public function handle(Request $request, string $user): JsonResponse
    {
        $data = User::findOrFail($user);
        
        return Response::json( $data->update($request->all()) );
    }
}
