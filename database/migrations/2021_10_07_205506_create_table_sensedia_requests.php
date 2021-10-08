<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSensediaRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensedias', function (Blueprint $table) {
            $table->id();
            $table->integer('id_empresa')->nullable();
            $table->integer('id_template')->nullable();
            $table->integer('id_unidade')->nullable();
            $table->string('nome_cliente')->nullable();
            $table->string('cpf_cnpj_campo')->nullable();
            $table->string('email')->nullable();
            $table->json('request_json')->nullable();
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
        Schema::dropIfExists('sensedia');
    }
}
