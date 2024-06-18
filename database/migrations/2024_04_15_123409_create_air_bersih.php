<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirBersih extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_bersih', function (Blueprint $table) {
            $table->id();
            $table->string('id_pelanggan');
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_telepon');
            $table->date('batas_pembayaran');
            $table->string('total_pemakaian');
            $table->integer('tagihan');
            $table->string('status');
 	        $table->string('foto')->nullable();
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
        Schema::dropIfExists('air_bersih');
    }
}
