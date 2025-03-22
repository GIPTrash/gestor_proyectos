<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Endpoint para registrar un usuario (público)
    public function register(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'user'         => new UserResource($user),
            'access_token' => $token,
            'token_type'   => 'Bearer'
        ], Response::HTTP_CREATED);
    }

    // Endpoint para login (público)
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'message' => 'Credenciales inválidas'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user'         => new UserResource($user),
            'access_token' => $token,
            'token_type'   => 'Bearer'
        ], Response::HTTP_OK);
    }

    // Resto de los endpoints (protegidos con Sanctum)
    public function index()
    {
        return response()->json(UserResource::collection(User::all()), Response::HTTP_OK);
    }

    // Este método "store" ya no se usará para registro público.
    // Se puede excluir de las rutas protegidas o bien dejarlo y utilizar register en su lugar.
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
