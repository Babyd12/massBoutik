<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         // Step 1: Change column to `string` temporarily
        Schema::table('stocks', function (Blueprint $table) {
            $table->string('operation')->change();
        });

         // Étape 2 : Add new value 'loss' and convert back to `enum`
        Schema::table('stocks', function (Blueprint $table) {
            DB::statement("ALTER TABLE stocks MODIFY COLUMN operation ENUM('storage', 'clearance', 'loss') NOT NULL ");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stocks', function (Blueprint $table) {
             // Return to the previous definition without the 'loss' value
            DB::statement("ALTER TABLE stocks MODIFY COLUMN operation ENUM('storage', 'clearance') NOT NULL");
        });
    }
};
