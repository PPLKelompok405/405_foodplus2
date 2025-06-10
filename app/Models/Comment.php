<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class Comment extends Model
{
protected $fillable = ["comment", "transaction_id", "user_id", "headline", "rating"];    //
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function donation(): BelongsTo {
        return $this->belongsTo(Donation::class);
    }
}
