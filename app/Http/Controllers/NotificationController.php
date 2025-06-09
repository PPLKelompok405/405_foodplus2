<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class NotificationController extends Controller implements HasMiddleware
{
    //

    public static function middleware() {

        return [
            new Middleware("auth:sanctum")
        ];
    }

    public function index(Request $request) {
        $notifData = $request->user()->unreadNotifications()->get();
        return response()->json([
            "status" => "Success",
            "message" => "Notifications retrieved",
            "data" => $notifData
        ]);
    }

    public function markReadNotification(Request $request) {
        $unReadNotifications = $request->user()->unreadNotifications;

        foreach ($unReadNotifications as $notification) {
            $notification->markAsRead();
        }

            return response()->json([
            "status" => "Success",
            "message" => "Notifications readed",
        ]);
    }

}
