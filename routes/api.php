<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonationRequestController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource("donations", DonationController::class);
Route::apiResource("donations.requests", DonationRequestController::class);
Route::apiResource("subscriptions", SubscriptionController::class);
Route::apiResource("notifications", NotificationController::class);
Route::apiResource("donations.comments", CommentController::class);
Route::apiResource("donations.likes", LikeController::class);

Route::post("/auth/register", [AuthController::class, "register"]);
Route::post("/auth/login", [AuthController::class, "login"]);
Route::post("/auth/logout", [AuthController::class, "logout"])->middleware("auth:sanctum");
Route::get("/donations/resto/all", [DonationController::class, "getDonationsByResto"]);


// Dashboard Statistic
Route::get("/statistics/receiver/dashboard/summary", [StatisticController::class, "getReceiverStatisticDashboard"]);
Route::get("/statistics/restorants/{resto}/donations/comments", [StatisticController::class, "getCountCommentsBelongToResto"]);
Route::get("/statistics/restorants/{resto}/donations/likes", [StatisticController::class, "getCountLikedBelongToResto"]);


Route::post("/donations/{donation}/update", [DonationController::class, "update"]);
Route::post("/notifications/read/all", [NotificationController::class, "markReadNotification"]);

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
