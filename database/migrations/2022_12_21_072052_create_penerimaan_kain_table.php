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
        Schema::create('penerimaan_kain', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->date('tanggal');
            $table->foreignId('id_customer')
            ->constrained('customer')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('jenis_kain');
            $table->string('warna');
            $table->foreignId('kop')
            ->constrained('kartu_order_proses')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('LOT');
            $table->string('ROL');
            $table->string('KG');
            $table->string('jenis_stock');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('penerimaan_produksi_kain');
    }
};
