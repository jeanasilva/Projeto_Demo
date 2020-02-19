<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_itens', function (Blueprint $table) {
            $table->bigIncrements('id'); //ID DA TABELA
            $table->string('descricao'); //DESCRIÇÃO DA LISTA QUE SERÁ INCLUIDA
            $table->timestamps(); //DATA QUE A MESMA FOR INCLUIDA
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_itens');
    }
}
