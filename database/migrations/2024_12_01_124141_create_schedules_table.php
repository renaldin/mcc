<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('tank_name'); // Nama Tangki
            $table->date('scheduled_date'); // Tanggal Pengurasan
            $table->boolean('is_verified')->default(false); // Status Verifikasi
            $table->timestamps();
        });
    }
};
