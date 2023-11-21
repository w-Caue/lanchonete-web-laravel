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
        Schema::table('itens', function(Blueprint $table){
            $table->unsignedBigInteger('tamanho_id')->after('preco');
            $table->unsignedBigInteger('categoria_id')->after('tamanho_id');

            $table->foreign('tamanho_id')->references('id')->on('tamanhos');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('itens', function(Blueprint $table){
            $table->dropForeign('itens_tamanho_id_foreign');
            $table->dropColumn('tamanho_id');

            $table->dropForeign('itens_categoria_id_foreign');
            $table->dropColumn('categoria_id');
        });
    }
};
