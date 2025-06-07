<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'category',
        'description',
        'quantity',
        'expiry_date',
        'image',
        'status'
    ];

    /**
     * Mendapatkan user (donatur) yang memiliki makanan ini
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mendapatkan semua permintaan untuk makanan ini
     */
    public function foodRequests()
    {
        return $this->hasMany(FoodRequest::class);
    }

    /**
     * Cek apakah makanan masih tersedia
     */
    public function isAvailable()
    {
        return $this->status === 'available' && $this->quantity > 0;
    }

    /**
     * Mendapatkan makanan yang masih tersedia
     */
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available')->where('quantity', '>', 0);
    }
}