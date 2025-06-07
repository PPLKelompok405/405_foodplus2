<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'food_id',
        'quantity',
        'notes',
        'status',
        'approved_at',
        'received_at'
    ];

    protected $dates = [
        'approved_at',
        'received_at',
        'created_at',
        'updated_at'
    ];

    /**
     * Mendapatkan user (penerima) yang membuat permintaan
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mendapatkan makanan yang diminta
     */
    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    /**
     * Menandai permintaan sebagai disetujui
     */
    public function approve()
    {
        $this->status = 'approved';
        $this->approved_at = now();
        $this->save();

        // Update status makanan menjadi reserved
        $this->food->status = 'reserved';
        $this->food->save();
    }

    /**
     * Menandai permintaan sebagai diterima
     */
    public function markAsReceived()
    {
        $this->status = 'received';
        $this->received_at = now();
        $this->save();

        // Update status makanan menjadi donated
        $this->food->status = 'donated';
        $this->food->save();
    }

    /**
     * Membatalkan permintaan
     */
    public function cancel()
    {
        $this->status = 'cancelled';
        $this->save();

        // Jika status makanan reserved, kembalikan ke available
        if ($this->food->status === 'reserved') {
            $this->food->status = 'available';
            $this->food->save();
        }
    }
}