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
        Schema::create('invoice_benang', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('BPB')
            ->constrained('bpb_benang')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->decimal('total_pembayaran', 15, 2);
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
        Schema::dropIfExists('invoice_benang');
    }	
};
