<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsTreatmentsTable extends Migration
{
    public function up()
    {
        Schema::create('cs_treatments', function (Blueprint $table) {
            $table->id();
            $table->string('process');
            $table->string('parameter');
            $table->string('standard');
            $table->string('tools');
            $table->decimal('inspection_result_1', 8, 2)->nullable();
            $table->decimal('inspection_result_2', 8, 2)->nullable();
            $table->string('judgement')->nullable();
            $table->string('recommendation')->nullable(); // Kolom rekomendasi tindakan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cs_treatments');
    }
}
