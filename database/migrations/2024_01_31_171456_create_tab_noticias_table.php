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
        Schema::create('tab_noticias', function (Blueprint $table) {
            $table->id('id_noticias_tbn')->comment("Identificador/Chave Primaria da noticia");
            $table->string('nome_noticia_tbn')->comment("Nome da noticia");
            $table->text('conteudo_noticia_tbn')->comment("Conteudo da noticia");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tab_noticias_not');
    }
};
