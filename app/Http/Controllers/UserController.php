<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Implement index method to handle filtering, searching, sorting, and limiting of users
    }

    public function store(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'age' => 'required|integer|min:0',
            'nickname' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create user
        $user = User::create($request->all());

        return response()->json(['user' => $user], 201);
    }

    public function update(Request $request, $id)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'age' => 'required|integer|min:0',
            'nickname' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Find user
        $user = User::findOrFail($id);

        // Update user
        $user->update($request->all());

        return response()->json(['user' => $user], 200);
    }

    public function destroy($id)
    {
        // Implement destroy method to delete a user
    }
}
