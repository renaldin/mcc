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
        Schema::table('drain_schedules', function (Blueprint $table) {
            $table->string('start_hour', 20)->nullable();
            $table->string('end_hour', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('drain_schedules', function (Blueprint $table) {
            $table->dropColumn('start_hour');
            $table->dropColumn('end_hour');
        });
    }
};
