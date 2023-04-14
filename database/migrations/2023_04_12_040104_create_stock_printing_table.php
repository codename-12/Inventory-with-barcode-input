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
        Schema::create('gj_stock_printing', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk');
            $table->string('kode_kain')->unique(); 
            $table->foreign('kode_kain')->references('kode_kain')->on('df_regkain_printing')->onDelete('cascade');
            $table->decimal('kg', 15, 2)->nullable()->default(0);
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
        Schema::create('gj_bs_printing', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk');
            $table->string('kode_kain')->unique(); 
            $table->foreign('kode_kain')->references('kode_kain')->on('df_regkain_printing')->onDelete('cascade');
            $table->decimal('kg', 15, 2)->nullable()->default(0);
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
        Schema::create('h_stock_printing', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kain')->unique(); 
            $table->foreign('kode_kain')->references('kode_kain')->on('df_regkain_printing')->onDelete('cascade');
            $table->decimal('kg', 15, 2)->nullable()->default(0);
            $table->date('tanggal_masuk');
            $table->date('tanggal_kirim');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
        Schema::create('h_bs_printing', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kain')->unique(); 
            $table->foreign('kode_kain')->references('kode_kain')->on('df_regkain_printing')->onDelete('cascade');
            $table->decimal('kg', 15, 2)->nullable()->default(0);
            $table->date('tanggal_masuk');
            $table->date('tanggal_kirim');
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
        Schema::dropIfExists('bs_printing');
        Schema::dropIfExists('h_stock_printing');
        Schema::dropIfExists('h_bs_printing');
    }
};

