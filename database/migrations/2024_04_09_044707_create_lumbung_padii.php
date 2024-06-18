<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLumbungPadii extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lumbung_padi', function (Blueprint $table) {
            $table->id();
            $table->string('no_ktp');
            $table->string('nama_peminjam');
            $table->string('alamat');
            $table->string('no_telepon');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->integer('total_pinjam');
            $table->integer('denda');
            $table->string('status');
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
        Schema::dropIfExists('lumbung_padi');
    }
}
