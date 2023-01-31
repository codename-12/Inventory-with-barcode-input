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
        Schema::create('stock_printing', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
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
            $table->foreignId('id_penerimaan')
            ->constrained('penerimaan_kain')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('id_pengiriman')->nullable()
            ->constrained('pengiriman_kain')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('stock_printing');
    }
};
