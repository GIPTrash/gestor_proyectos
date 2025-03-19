<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(UserResource::collection(User::all()), Response::HTTP_OK);
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        return response()->json(new UserResource($user), Response::HTTP_CREATED);
    }

    public function show(User $user)
    {
        return response()->json(new UserResource($user), Response::HTTP_OK);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return response()->json(new UserResource($user), Response::HTTP_OK);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado'], Response::HTTP_OK);
    }
}
