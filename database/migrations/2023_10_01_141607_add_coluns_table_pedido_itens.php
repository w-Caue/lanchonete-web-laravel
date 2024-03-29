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
        Schema::table('pedidos_itens', function (Blueprint $table) {
            $table->integer('quantidade')->after('produto_id');
            $table->double('total')->after('quantidade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos_itens', function (Blueprint $table) {
            $table->dropColumn('quantidade');
            $table->dropColumn('total');
        });
    }
};
