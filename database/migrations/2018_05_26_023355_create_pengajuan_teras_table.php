<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanTerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_teras', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_alatukur')->unsigned();
          $table->integer('id_admin')->nullable()->unsigned();
          $table->integer('id_rekanan')->nullable()->unsigned();
          $table->date('tgl_tera')->nullable();
          $table->date('tgl_expired')->nullable();
          $table->integer('no_agenda')->unsigned();
          $table->integer('status')->unsigned()->default(0);
          $table->timestamps();

          $table->foreign('id_admin')->references('id')->on('admins')->onDelete('CASCADE');
          $table->foreign('id_alatukur')->references('id')->on('alat_ukurs')->onDelete('CASCADE');
          $table->foreign('id_rekanan')->references('id')->on('rekanans')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_teras');
    }
}
