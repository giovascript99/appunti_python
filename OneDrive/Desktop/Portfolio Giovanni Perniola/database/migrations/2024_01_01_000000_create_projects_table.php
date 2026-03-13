<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('titolo');
            $table->string('slug')->unique();
            $table->string('descrizione_breve');
            $table->longText('descrizione_dettagliata')->nullable();
            $table->string('immagine_copertina')->nullable();
            $table->json('tecnologie')->nullable();
            $table->string('link_live')->nullable();
            $table->string('link_github')->nullable();
            $table->integer('ordine')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
