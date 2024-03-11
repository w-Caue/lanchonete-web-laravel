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
        Schema::create('combos_produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('combo_id');
            $table->foreignId('produto_id');
            $table->float('valor_produto', 9, 2)->nullable();
            $table->timestamps();

            $table->foreign('combo_id')->on('combos')->references('id');
            $table->foreign('produto_id')->on('produtos')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('combos_produtos');

        Schema::enableForeignKeyConstraints();
    }
};
