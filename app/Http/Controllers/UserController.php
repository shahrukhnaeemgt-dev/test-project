<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            return response()->json(UserResource::collection(User::all()));
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error fetching users', 'error' => $th->getMessage()], 500);
        }
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        try {
            $user = User::create($request->validated());

            return response()->json(new UserResource($user));
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error creating user', 'error' => $th->getMessage()], 500);
        }
    }

    public function show(User $user): JsonResponse
    {
        try {
            return response()->json(new UserResource($user));
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error fetching user', 'error' => $th->getMessage()], 500);
        }
    }

    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        try {
            $user->update($request->validated());

            return response()->json(new UserResource($user));
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error updating user', 'error' => $th->getMessage()], 500);
        }
    }

    public function destroy(User $user): JsonResponse
    {
        try {
            $user->delete();

            return response()->json(['message' => 'User deleted successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error deleting user', 'error' => $th->getMessage()], 500);
        }
    }
}
