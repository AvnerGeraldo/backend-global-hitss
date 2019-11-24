<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonagemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personagem', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nome', 10);
            $table->integer('vida')->unsigned();
            $table->integer('forca')->unsigned();
            $table->integer('agilidade')->unsigned();
            $table->integer('dado')->unsigned();
            $table->integer('id_arma')->unsigned();
            $table->foreign('id_arma', 'fk_personagem_id_arma')
                ->references('id')
                ->on('arma')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::create('personagem', function (Blueprint $table) {
            $table->dropForeign('fk_personagem_id_arma');
            $table->dropColumn('nome');
            $table->dropColumn('vida');
            $table->dropColumn('forca');
            $table->dropColumn('agilidade');
            $table->dropColumn('dado');
            $table->dropColumn('id_arma');
        });
    }
}
