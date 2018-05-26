<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUttpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uttps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('id_jenisuttp')->unsigned();
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('id_jenisuttp')->references('id')->on('jenis_uttps')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uttps');
    }
}
