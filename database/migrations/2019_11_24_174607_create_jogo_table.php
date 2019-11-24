<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJogoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('turno')->unsigned();
            $table->integer('jogador_iniciante')->unsigned();
            $table->integer('id_personagem_orc')->unsigned();
            $table->integer('vida_orc')->unsigned();
            $table->integer('id_personagem_humano')->unsigned();
            $table->integer('vida_humano')->unsigned();
            $table->foreign('jogador_iniciante', 'fk_jogo_jogador_iniciante')
                ->references('id')
                ->on('personagem');
            $table->foreign('id_personagem_orc', 'fk_jogo_id_personagem_orc')
                ->references('id')
                ->on('personagem');
            $table->foreign('id_personagem_humano', 'fk_jogo_id_personagem_humano')
                ->references('id')
                ->on('personagem');
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
        Schema::create('jogo', function (Blueprint $table) {
            $table->dropForeign('fk_jogo_jogador_iniciante');
            $table->dropForeign('fk_jogo_id_personagem_orc');
            $table->dropForeign('fk_jogo_id_personagem_humano');
            $table->dropColumn('turno');
            $table->dropColumn('jogador_iniciante');
            $table->dropColumn('id_personagem_orc');
            $table->dropColumn('vida_orc');
            $table->dropColumn('id_personagem_humano');
            $table->dropColumn('vida_humano');
            $table->dropColumn('jogador_iniciante');
            $table->dropColumn('id_personagem_orc');
            $table->dropColumn('id_personagem_humano');
        });
    }
}
