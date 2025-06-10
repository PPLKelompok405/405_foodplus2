<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            "name" => "string|nullable",
            "email" => "string|nullable",
            "password" => "string|nullable",
        ]);
        $user = User::where("id", $_COOKIE['user_id'])->first();

        if(!$validatedData["password"]) {
            $user->update([
                "name" => $validatedData["name"],
                "email" => $validatedData["email"],
            ]);
        }else {
            $validatedData["password"] = Hash::make($validatedData["password"]);
            $user->update($validatedData);
        }

        return redirect('/profile')->with('success', 'Profile berhasil diubah');
    }
}
