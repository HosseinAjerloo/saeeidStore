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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->json('variant_attribute_ids')->nullable();
            $table->foreignId('variant_id')->constrained('product_variants')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedInteger('quantity')->default(1);
            $table->foreignId('discount_id')->nullable()->constrained('discounts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->decimal('discount_amount', 20, 3)->default(0);
            $table->enum('discount_type', ['percentage','fixed'])->default('percentage');
            $table->decimal('unit_price', 20, 3);
            $table->decimal('final_unit_price', 20, 3);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
