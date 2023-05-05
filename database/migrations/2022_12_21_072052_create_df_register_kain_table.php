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
        Schema::create('df_regkain_polos', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kain')->unique();
            $table->date('tanggal');
            $table->foreignId('kop')
            ->constrained('kartu_order_proses')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('warna');
            $table->string('LOT');
            $table->string('ROL');
            $table->string('KG');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
        Schema::create('df_regkain_printing', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kain')->unique();
            $table->date('tanggal'); 
            $table->string('warna');
            $table->foreignId('kop')
            ->constrained('kartu_order_proses_printing')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('LOT');
            $table->string('ROL');
            $table->string('KG');
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
        Schema::dropIfExists('df_regkain_polos');
        Schema::dropIfExists('df_regkain_printing');
    }
};
