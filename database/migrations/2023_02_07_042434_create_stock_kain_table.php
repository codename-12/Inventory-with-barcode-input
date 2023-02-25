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
        Schema::create('stock_polos', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk');
            $table->string('kode_kain')->unique(); 
            $table->foreign('kode_kain')->references('kode_kain')->on('df_regkain_polos')->onDelete('cascade');
            $table->decimal('kg', 15, 2)->nullable()->default(0);
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
        Schema::create('bs_polos', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk');
            $table->string('kode_kain')->unique(); 
            $table->foreign('kode_kain')->references('kode_kain')->on('df_regkain_polos')->onDelete('cascade');
            $table->decimal('kg', 15, 2)->nullable()->default(0);
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
        Schema::dropIfExists('stock_polos');
        Schema::dropIfExists('bs_polos');
    }
};
