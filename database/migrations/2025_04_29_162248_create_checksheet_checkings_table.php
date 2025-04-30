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
        Schema::create('checksheet_checkings', function (Blueprint $table) {
            $table->id();
            $table->string('part_name', 255);
            $table->date('date');
            $table->string('air_pocket', 255);
            $table->string('gumpal', 255);
            $table->string('bercak', 255);
            $table->string('tipis', 255);
            $table->string('meler', 255);
            $table->string('tunggu_repair', 255);
            $table->string('total_check', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checksheet_checkings');
    }
};
