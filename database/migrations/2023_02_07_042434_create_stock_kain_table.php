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
            $table->foreignId('id_penerimaan')
            ->constrained('penerimaan_kain')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('kode_kain')->unique(); 
            $table->foreign('kode_kain')->references('kode_kain')->on('df_regkain_polos')->onDelete('cascade');
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
        Schema::dropIfExists('stock_kain');
    }
};
