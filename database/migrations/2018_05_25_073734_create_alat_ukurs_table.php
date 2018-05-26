<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlatUkursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alat_ukurs', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_perusahaan')->unsigned();
          $table->integer('id_uttp')->unsigned();
          $table->integer('id_merk')->nullable()->unsigned();
          $table->integer('id_uom')->nullable()->unsigned();
          $table->string('tipe')->nullable();
          $table->string('no_seri')->nullable();
          $table->string('kapasitas')->nullable();
          $table->timestamps();

          $table->foreign('id_perusahaan')->references('id')->on('perusahaans')->onDelete('CASCADE');
          $table->foreign('id_uttp')->references('id')->on('uttps')->onDelete('CASCADE');
          $table->foreign('id_merk')->references('id')->on('merks')->onDelete('CASCADE');
          $table->foreign('id_uom')->references('id')->on('uoms')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alat_ukurs');
    }
}
