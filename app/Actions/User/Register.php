<?php

namespace App\Actions\User;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Response;
use App\Models\User;

class Register
{
    use AsAction;

    public function rules(): array
    {
        return [       
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|confirmed'
        ];
    }

    public function handle(Request $request): JsonResponse
    {
        return Response::json(User::create($request->all()));
    }
}
