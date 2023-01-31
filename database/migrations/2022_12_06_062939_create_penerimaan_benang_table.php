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
        Schema::create('penerimaan_benang', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('id_supplier')
            ->constrained('supplier_benang')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('BPB')
            ->constrained('bpb_benang')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('SJ');
            $table->string('jenis_benang');
            $table->string('tipe_benang');
            $table->string('LOT');
            $table->double('BOX_KRG', 15, 2);
            $table->double('KG', 15, 2);
            $table->double('BALE', 15, 2);
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
        Schema::dropIfExists('penerimaan_benang');
    }
};
