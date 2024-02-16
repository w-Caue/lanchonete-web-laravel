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
        Schema::create('formas_pagamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->timestamps();
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->string('status', 15)->after('id');
            $table->unsignedBigInteger('forma_pagamento_id')->after('status');

            $table->foreign('forma_pagamento_id')->references('id')->on('formas_pagamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropForeign('pedidos_forma_pagamento_id_foreign');
            $table->dropColumn('forma_pagamento_id');
        });

        Schema::dropIfExists('formas_pagamentos');

    }
};
