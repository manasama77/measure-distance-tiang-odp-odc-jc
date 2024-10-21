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
        Schema::create('tiangs', function (Blueprint $table) {
            $table->id();
            $table->string('branch');
            $table->string('jenis_tiang');
            $table->string('milik');
            $table->string('nama_tiang');
            $table->string('lat');
            $table->string('lng');
            $table->string('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiangs');
    }
};
