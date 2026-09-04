<?php

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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('cart_token')->unique();
            $table->foreignId('discount_id')->nullable()->constrained('discounts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('discount_type', ['percentage','fixed'])->default('percentage');
            $table->decimal('discount_amount', 20, 3)->default(0);
            $table->enum('status', ['active','checkout'])->default('active');
            $table->decimal('final_price', 20, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
