<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->length(50);
            $table->string('prenom')->length(50);
            $table->string('email')->length(50);
            $table->string('telephone')->length(50);
            $table->string('adresse')->length(50);
            $table->integer('codepostal');
            $table->string('ville')->length(50);
            $table->string('mot_de_passe')->length(50);
            $table->tinyInteger('statut')->default(0);
            $table->text('commentaire');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}
