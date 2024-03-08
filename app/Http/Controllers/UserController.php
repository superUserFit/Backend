<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\common\GeneralHelpers;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request) {
        $data = $request->json()->all();
        $User = User::where('email', $data['email'])->first();

        if (!empty($User)) {
            if (Hash::check($data['password'], $User->password)) {
                return response()->json([
                    'status' => 200,
                    'message' => 'User successfully logged in',
                ], 200);
            } else {
                return response()->json([
                    'status' => 401,
                    'message' => 'Incorrect password',
                ], 401);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User account does not exist',
            ], 404);
        }
    }


    public function signup(Request $request) {
        $data = $request->json()->all();

        // Check if the user already exists
        $ExistingUser = User::where('email', $data['email'])->orWhere('username', $data['username'])->first();

        if(!empty($ExistingUser)) {
            return response()->json([
                'status' => 403,
                'message' => 'User already exists'
            ], 403);
        }

        // Hash the password
        $data['password'] = Hash::make($data['password']);

        $User = new User();

        GeneralHelpers::SaveData($User, $data);

        return response()->json([
            'status' => 200,
            'data' => $User->id
        ], 200);
    }
}
