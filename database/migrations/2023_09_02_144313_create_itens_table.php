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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->text('descricao', 200);
            $table->double('preco', 10, 2);
            $table->enum('tipo_ecommerce', ['S', 'N'])->default('N');
            $table->enum('promocao', ['S', 'N'])->default('N');
            $table->double('valor_promocao', 10, 2)->nullable();
            $table->string('tamanho')->nullable();      
            $table->string('imagem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
