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
        // Schema::table('pedidos', function (Blueprint $table) {
        //     $table->dropForeign('pedidos_cliente_id_foreign');
        //     $table->dropColumn('cliente_id');
        // });

        // Schema::dropIfExists('clientes');

        Schema::table('pedidos', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::create('clientes', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nome', 60);
        //     $table->timestamps();
        // });

        // Schema::table('pedidos', function (Blueprint $table) {
        //     $table->unsignedBigInteger('cliente_id');
        //     $table->foreign('cliente_id')->references('id')->on('clientes');
        // });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropForeign('pedidos_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
