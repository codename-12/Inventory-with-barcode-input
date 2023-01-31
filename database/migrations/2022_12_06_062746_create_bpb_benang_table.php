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
        Schema::create('bpb_benang', function (Blueprint $table) {
            $table->id();
            $table->string('no_bpb');
            $table->foreignId('id_supplier')
            ->constrained('supplier_benang')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('surat_jalan');
            $table->double('harga', 15, 3); 
            $table->double('pembayaran', 15, 3); 
            $table->enum('status',['lunas','belum lunas'])->default('belum lunas');
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
        Schema::dropIfExists('bpb_benang');
    }
};
