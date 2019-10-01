<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustodiasTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('custodias', function (Blueprint $table) {
        $table->increments('id');
        $table->string('descripcion')->nullable();
        $table->string('ubicacion')->nullable();
        $table->string('folio')->nullable();
        $table->integer('respopnsable_id')->unsigned();
        $table->foreign('respopnsable_id')->references('id')->on('users');
        $table->integer('estadocustodia_id')->unsigned();
        $table->foreign('estadocustodia_id')->references('id')->on('estados_custodia');
        $table->timestamps();
        $table->softDeletes();
        });
    }
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('custodias');
    }
}