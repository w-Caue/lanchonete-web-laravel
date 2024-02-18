<?php

use App\Models\Encarte;
use App\Models\Produto;
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
        Schema::create('encartes', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 80);
            $table->dateTime('data_inicio');
            $table->dateTime('data_final');
            $table->enum('ativo', ['S', 'N'])->default('N');
            $table->timestamps();
        });

        Schema::create('encartes_produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('encarte_id');
            $table->foreignId('produto_id');
            $table->timestamps();        
            
            $table->foreign('encarte_id')->on('encartes')->references('id');
            $table->foreign('produto_id')->on('produtos')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('encartes');
        Schema::dropIfExists('encartes_produtos');
        
        Schema::enableForeignKeyConstraints();
    }
};
