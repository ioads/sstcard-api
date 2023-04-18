<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParceirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parceiros', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('cnpj');
            $table->string('nome_fantasia');
            $table->string('razao_social');
            $table->string('celular')->nullable();
            $table->string('telefone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email');
            $table->string('cep');
            $table->string('logradouro');
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('referencia')->nullable();
            $table->string('cidade');
            $table->string('uf');
            $table->boolean('status');
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
        Schema::dropIfExists('parceiros');
    }
}
