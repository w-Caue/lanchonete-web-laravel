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
        Schema::table('enderecos', function (Blueprint $table) {
            $table->unsignedBigInteger('pessoa_id')->after('id');
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('enderecos', function (Blueprint $table) {
            $table->dropForeign('enderecos_pessoa_id_foreign');
            $table->dropColumn('pessoa_id');
        });
        Schema::enableForeignKeyConstraints();
    }
};
