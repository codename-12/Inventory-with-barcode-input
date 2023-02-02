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
            $table->date('tanggal_masuk')->nullable()->default(new DateTime());
            $table->uuid('kode_kain')->unique(); 
            $table->foreign('kode_kain')->references('kode_kain')->on('df_regkain_polos')->onDelete('cascade');
            $table->decimal('kg', 5, 2)->nullable()->default(0);
            $table->timestamps();
        });
        Schema::create('pengiriman_kain', function (Blueprint $table) {
            $table->id();
            $table->string('SP_NO');
            $table->uuid('kode_kain')->unique(); 
            $table->foreign('kode_kain')->references('kode_kain')->on('df_regkain_polos')->onDelete('cascade');
            $table->string('NO_PO');
            $table->date('tanggal_kirim')->nullable()->default(new DateTime());
            $table->string('TOTAL');
            $table->string('NO_POL');
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
        Schema::dropIfExists('pengiriman_kain');
    }
};
