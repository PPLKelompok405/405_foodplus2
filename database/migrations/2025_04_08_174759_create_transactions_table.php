<?php

use App\Models\Donation;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, "donor_id");
            $table->foreignIdFor(User::class, "receiver_id");
            $table->foreignIdFor(Donation::class, "donation_id");
            $table->enum("status", ["pending", "completed", "cancelled"])->default("pending");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
