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
    Schema::table('produtos', function (Blueprint $table) {
        // Criamos a coluna como string e nullable (para não dar erro nos produtos que já existem)
        $table->string('imagem')->nullable()->after('estoque');
    });
}

public function down(): void
{
    Schema::table('produtos', function (Blueprint $table) {
        // Caso você desfaça a migration, a coluna é removida
        $table->dropColumn('imagem');
    });
}
};
