<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\common\GeneralHelpers;
use App\Models\User;

class UserController extends Controller
{
    public function login() {
        $data = $_POST;

        echo '<pre>';
        print_r($data);
        die();
    }

    public function signup(Request $request) {
        $data = $request->input('User');
        $data['password'] = Hash::make($data['password']);
        unset($data['Password']);

        $User = new User();

        GeneralHelpers::SaveData($User, $data);

        return ['data' => $User['id']];
    }
}
