<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('tva', 5, 2)->default(20.00)->after('prix');
            $table->decimal('prix_ttc', 10, 2)->default(0)->after('tva');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['tva', 'prix_ttc']);
        });
    }
};