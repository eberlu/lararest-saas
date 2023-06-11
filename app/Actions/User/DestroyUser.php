<?php

namespace App\Actions\User;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;
use App\Models\User;

class DestroyUser
{
    use AsAction;

    public function getControllerMiddleware(): array
    {
        return ['isCurrentUserOrAdmin'];
    }

    public function handle(Request $request, string $user): JsonResponse
    {
        $data = User::findOrFail($user);

        return Response::json( $data->delete() );
    }
}
