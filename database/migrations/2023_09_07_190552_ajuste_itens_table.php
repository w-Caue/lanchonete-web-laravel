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
            $table->unsignedBigInteger('marca_id')->after('tamanho')->nullable();
            $table->unsignedBigInteger('categoria_id')->after('marca_id')->nullable();
            $table->unsignedBigInteger('grupo_id')->after('categoria_id')->nullable();

            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('grupo_id')->references('id')->on('grupos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function(Blueprint $table){
            $table->dropColumn('tamanho');
            $table->dropColumn('valor_promocao');

            $table->dropForeign('produtos_marca_id_foreign');
            $table->dropColumn('marca_id');

            $table->dropForeign('produtos_categoria_id_foreign');
            $table->dropColumn('categoria_id');

            $table->dropForeign('produtos_grupo_id_foreign');
            $table->dropColumn('grupo_id');
        });
    }
};
