<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $notificationsNotRead = \App\Models\Notification::where('notifiable_id', $_COOKIE['user_id'])->where('read_at', null)->get();
        $notificationsRead = \App\Models\Notification::where('notifiable_id', $_COOKIE['user_id'])->where('read_at', '!=', null)->get();

        $donatur = User::where('role', 'penyedia');

        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $donatur->where('name', 'like', '%' . $search . '%');
        }

        $donatur = $donatur->get();

        return view("Admin.dashboard", [
            'notificationsNotRead' => $notificationsNotRead,
            'notificationsRead' => $notificationsRead,
            'donatur' => $donatur,
            'searchQuery' => $request->input('search', '') // Pass the search query back to the view
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
} 