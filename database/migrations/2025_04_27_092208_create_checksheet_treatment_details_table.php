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
        Schema::create('checksheet_treatment_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('checksheet_treatment_id');
            $table->string('process', 255);
            $table->string('parameter', 255);
            $table->string('standard', 255);
            $table->string('tools', 255);
            $table->decimal('inspection_result_1', 8, 2)->nullable();
            $table->decimal('inspection_result_2', 8, 2)->nullable();
            $table->string('judgement')->nullable();
            $table->string('recommendation')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checksheet_treatment_details');
    }
};
