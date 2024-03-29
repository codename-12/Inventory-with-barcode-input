<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_order_proses', function (Blueprint $table) {
            $table->id();
            $table->string('NO_KOP');
            $table->string('NO_SSP-SJ');
            $table->foreignId('id_customer')
            ->constrained('customer')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->date('tanggal');
            $table->string('jenis_kain');
            $table->string('lebar');
            $table->string('ROL');
            $table->string('KG');
            $table->string('LOT');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
        Schema::create('kartu_order_proses_printing', function (Blueprint $table) {
            $table->id();
            $table->string('NO_KOPP');
            $table->string('NO_SSP-SJ');
            $table->foreignId('id_customer')
            ->constrained('customer')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('jenis_kain');
            $table->date('tanggal');
            $table->string('design');
            $table->string('lebar');
            $table->string('ROL');
            $table->string('KG');
            $table->string('LOT');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('kartu_order_proses');
        Schema::dropIfExists('kartu_order_proses_printing');
    }

};
