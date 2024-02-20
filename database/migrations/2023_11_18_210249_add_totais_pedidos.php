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
        Schema::table('pedidos', function(Blueprint $table){
            $table->float('total_itens', 9, 2)->nullable()->after('forma_pagamento_id');
            $table->float('desconto', 5, 2)->nullable()->after('total_itens');
            $table->float('total_pedido', 9, 2)->nullable()->after('desconto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos', function(Blueprint $table){
            $table->dropColumn('total_itens');
            $table->dropColumn('desconto');
            $table->dropColumn('total_pedido');
        });
    }
};
