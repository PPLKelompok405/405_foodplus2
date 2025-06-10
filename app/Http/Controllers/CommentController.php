<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CommentController extends Controller implements HasMiddleware
{

    public static function middleware() {
        return [
            new Middleware("auth:sanctum", except: ["index", "store"])
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Donation $donation)
    {
        // return response()->json([
        //     "status" => "Success",
        //     "message" => "Comment for donation {$donation->id} retrieved",
        //     "data" => $donation->comments()->with("user")->get()
        // ]);

       $resto = User::where('id', $_COOKIE["user_id"])->withCount('comments')->withCount('likes')->first();


        $comments = $donation->comments()->orderByDesc("created_at")->get();
        $donations = $resto->donations;
$transaction = $donation->transactions()
    ->where('receiver_id', $_COOKIE["user_id"])
    ->first();
    $quantity = 0;
    if(!!$transaction) {
        $quantity = $transaction->quantity;
    }

    $averageRating = $donation->comments()->average("rating");

        // $averageRating = round(
        //     Comment::whereIn('donation_id', $resto->donations->pluck('id'))->avg('rating'),
        //     1
        // );

        return view('donate.comment.index', compact('resto', 'comments', 'averageRating', 'donations', "transaction", "quantity"));
   }


    public function store(Request $request, Donation $donation)
    {
        $validatedData = $request->validate([
            "comment" => "string|min:1|required",
            "rating" => "integer|required",
            "headline" => "string|required"
        ]);
        $comment = $donation->comments()->create([
            ...$validatedData,
            "user_id" => $_COOKIE["user_id"],
            "donation_id" => $donation->id
        ]);

        return redirect('/resto/comment/' . $donation->id);
    }
}
