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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->integer('cep');
            $table->string('endereco', 100);
            $table->integer('numero');
            $table->string('complemento', 70)->nullable();
            $table->string('bairro', 20);
            $table->string('referencia', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('enderecos');
        Schema::enableForeignKeyConstraints();
    }
};
