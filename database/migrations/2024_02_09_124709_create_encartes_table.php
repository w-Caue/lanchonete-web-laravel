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
        Schema::create('encartes', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 80);
            $table->dateTime('data_inicio');
            $table->dateTime('data_final');
            $table->string('ativo')->default('N');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encartes');
    }
};
