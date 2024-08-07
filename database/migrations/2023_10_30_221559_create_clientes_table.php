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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('status')->default('Ativo');
            $table->enum('tipo_ecommerce', ['S', 'N'])->default('N');
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('clientes');

        Schema::enableForeignKeyConstraints();
    }
};
