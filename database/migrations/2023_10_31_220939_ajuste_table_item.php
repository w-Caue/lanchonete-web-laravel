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
        // Schema::table('itens', function (Blueprint $table) {
        //     $table->dropForeign('itens_tamanho_id_foreign');
        //     $table->dropColumn('tamanho_id');
        // });

        // Schema::table('itens', function (Blueprint $table) {
        //     $table->string('tamanho')->after('preco');
        // });
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('itens', function (Blueprint $table) {
        //     $table->dropColumn('tamanho');
        // });

        // Schema::table('itens', function (Blueprint $table) {
        //     $table->unsignedBigInteger('tamanho_id')->nullable()->after('preco');
        //     $table->foreign('tamanho_id')->references('id')->on('tamanhos');
        // });
    }
};
