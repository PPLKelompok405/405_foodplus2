<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiveController extends Controller
{
    /**
     * Menampilkan dashboard penerima
     */
    public function dashboard()
    {
        // Ambil semua permintaan dari user yang sedang login
        $requests = FoodRequest::where('user_id', Auth::id())
            ->with('food')
            ->latest()
            ->get();

        // Ambil makanan yang tersedia untuk diminta
        $availableFoods = Food::where('status', 'available')
            ->where('expiry_date', '>', now())
            ->get();

        return view('receive.dashboard', compact('requests', 'availableFoods'));
    }

    /**
     * Menampilkan form untuk membuat permintaan baru
     */
    public function create()
    {
        $availableFoods = Food::where('status', 'available')
            ->where('expiry_date', '>', now())
            ->get();

        return view('receive.create', compact('availableFoods'));
    }

    /**
     * Menyimpan permintaan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'food_id' => 'required|exists:foods,id',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:255',
        ]);

        // Cek apakah makanan masih tersedia
        $food = Food::findOrFail($request->food_id);
        if ($food->status !== 'available' || $food->expiry_date <= now()) {
            return redirect()->back()->with('error', 'Makanan tidak tersedia lagi.');
        }

        // Buat permintaan baru
        FoodRequest::create([
            'user_id' => Auth::id(),
            'food_id' => $request->food_id,
            'quantity' => $request->quantity,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->route('receive.dashboard')->with('success', 'Permintaan berhasil dibuat.');
    }

    /**
     * Menampilkan detail permintaan
     */
    public function show($id)
    {
        $foodRequest = FoodRequest::where('id', $id)
            ->where('user_id', Auth::id())
            ->with(['food', 'food.user'])
            ->firstOrFail();

        return view('receive.show', compact('foodRequest'));
    }

    /**
     * Menampilkan form untuk mengedit permintaan
     */
    public function edit($id)
    {
        $foodRequest = FoodRequest::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();

        $availableFoods = Food::where('status', 'available')
            ->where('expiry_date', '>', now())
            ->get();

        return view('receive.edit', compact('foodRequest', 'availableFoods'));
    }

    /**
     * Memperbarui permintaan
     */
    public function update(Request $request, $id)
    {
        $foodRequest = FoodRequest::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();

        $request->validate([
            'food_id' => 'required|exists:foods,id',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:255',
        ]);

        // Cek apakah makanan masih tersedia
        $food = Food::findOrFail($request->food_id);
        if ($food->status !== 'available' || $food->expiry_date <= now()) {
            return redirect()->back()->with('error', 'Makanan tidak tersedia lagi.');
        }

        // Update permintaan
        $foodRequest->update([
            'food_id' => $request->food_id,
            'quantity' => $request->quantity,
            'notes' => $request->notes,
        ]);

        return redirect()->route('receive.dashboard')->with('success', 'Permintaan berhasil diperbarui.');
    }

    /**
     * Menghapus permintaan
     */
    public function destroy($id)
    {
        $foodRequest = FoodRequest::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();

        $foodRequest->delete();

        return redirect()->route('receive.dashboard')->with('success', 'Permintaan berhasil dihapus.');
    }

    /**
     * Menandai permintaan sebagai diterima
     */
    public function markReceived($id)
    {
        $foodRequest = FoodRequest::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('status', 'approved')
            ->firstOrFail();

        $foodRequest->update([
            'status' => 'received'
        ]);

        return redirect()->route('receive.dashboard')->with('success', 'Permintaan berhasil ditandai sebagai diterima.');
    }
}