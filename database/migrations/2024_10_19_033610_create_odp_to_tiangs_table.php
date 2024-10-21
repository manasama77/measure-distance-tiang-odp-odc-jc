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
        Schema::create('odp_to_tiangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tiang_id')->constrained();
            $table->foreignId('odp_id')->constrained();
            $table->float('distance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odp_to_tiangs');
    }
};
