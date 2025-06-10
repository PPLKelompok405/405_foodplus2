<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        if (!isset($_COOKIE['user_id'])) {
            return redirect('/login');
        } else {
            $user = User::find($_COOKIE['user_id']);
            $batalUrl = '';
            switch ($user->role) {
                case 'penerima':
                    $batalUrl = '/receive/dashboard';
                    break;
                case 'penyedia':
                    $batalUrl = '/donate/dashboard';
                    break;
                case 'admin':
                    $batalUrl = '/admin/dashboard';
                    break;
            }

            $userJson = json_encode($user);

            return view('profile.profile', compact('user', 'batalUrl', 'userJson'));
        }
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "sometimes|string",
            "email" => "sometimes|string",
            "password" => "sometimes|string",
            "phone" => "sometimes|string",
            "address" => "sometimes|string",
        ]);
        $user = User::where($_COOKIE['user_id']);
        if ($validatedData["password"] != '') {
                    $user->update([
            "name" => $validatedData["name"],
            "email" => $validatedData["email"],
            "phone" => $validatedData["phone"],
            "address" => $validatedData["address"],
            "password" => $validatedData["password"] ?? $user->password
                    ]);
        }else {
            $user->update([
            "name" => $validatedData["name"],
            "email" => $validatedData["email"],
            "phone" => $validatedData["phone"],
            "address" => $validatedData["address"],
        ]);
        }


        return redirect('/profile')->with('success', 'Profile berhasil diubah');
    }
}
