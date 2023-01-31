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
        Schema::create('master_benang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_supplier')
            ->constrained('supplier_benang')
            ->onUpdate('cascade')
            ->onDelete('cascade');;
            $table->string('tipe_benang');
            $table->string('jenis_benang');
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
        Schema::dropIfExists('master_benang');
    }
};
