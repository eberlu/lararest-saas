<?php

namespace App\Actions\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;
use App\Models\User;

class IndexUsers
{
    use AsAction;

    public function getControllerMiddleware(): array
    {
        return ['auth:admin'];
    }

    public function handle(): JsonResponse
    {
        return Response::json(User::get());
    }
}
