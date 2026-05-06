<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');           // hero, partners, services
            $table->string('label');          // Section Hero, Partenaires, Services
            $table->boolean('enabled')->default(true);
            $table->integer('order')->default(1);
            $table->json('content')->nullable(); // all dynamic content stored as JSON
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};