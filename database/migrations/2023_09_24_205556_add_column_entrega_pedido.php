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
        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreignId('pagamento_id')->after('ecommerce');
            $table->foreignId('endereco_id')->nullable()->after('pagamento_id'); 
            
            $table->foreign('pagamento_id')->references('id')->on('formas_pagamentos');
            $table->foreign('endereco_id')->references('id')->on('enderecos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropForeign('pedidos_pagamento_id_foreign');
            $table->dropForeign('pedidos_endereco_id_foreign');
            
            $table->dropColumn('pagamento_id');
            $table->dropColumn('endereco_id');
        });
    }
};
