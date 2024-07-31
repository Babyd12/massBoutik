<?php

use App\Models\Product;
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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->enum('operation', ['storage', 'clearance']);
            $table->enum('operation_type', ['bulk', 'in_detail']);
            $table->float('price');
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            // $table->foreignIdFor(Lend::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
