<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_barang')->unsigned();
            $table->integer('id_pembeli')->unsigned();
            $table->integer('jumlah');
            $table->decimal('total', 10,2);
            $table->foreign('id_barang')
                  ->references('id') -> on('barangs')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
            $table->foreign('id_pembeli')
                  ->references('id') -> on('pembelis')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
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
        Schema::dropIfExists('transaksis');
    }
}
