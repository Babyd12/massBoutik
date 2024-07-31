<?php

use App\Models\Product;
use App\Models\Service;
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
        Schema::create('lends', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->boolean('payment_status')->default(false);
            $table->enum('operation_type', ['bulk', 'in_detail']);
            $table->foreignIdFor(Service::class)->nullable()->constrained()->cascadeOnDelete();    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lends');
    }
};
