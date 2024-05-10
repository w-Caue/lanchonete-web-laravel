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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('observacao')->nullable(); 
            $table->string('status', 15);
            $table->enum('ecommerce', ['S', 'N'])->default('N');
            $table->enum('retirada', ['S', 'N'])->default('N');
            $table->float('total_itens', 9, 2)->nullable();
            $table->float('desconto', 5, 2)->nullable();
            $table->float('total_pedido', 9, 2)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');      
        });

        Schema::create('pedidos_itens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('produto_id');
            $table->text('observacao', 300)->nullable();
            $table->integer('quantidade');
            $table->double('total');
            $table->timestamps();

            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('pedidos_itens');
        
        Schema::enableForeignKeyConstraints();
    }
};
