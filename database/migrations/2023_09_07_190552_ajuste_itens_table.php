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
        Schema::table('produtos', function(Blueprint $table){
            $table->string('tamanho')->after('preco');
            $table->unsignedBigInteger('categoria_id')->after('tamanho');

            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function(Blueprint $table){
            $table->dropColumn('tamanho');

            $table->dropForeign('produtos_categoria_id_foreign');
            $table->dropColumn('categoria_id');
        });
    }
};
