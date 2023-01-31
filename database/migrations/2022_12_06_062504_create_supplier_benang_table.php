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
        Schema::create('supplier_benang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier');
            $table->decimal('saldo', 15, 2);
            $table->decimal('hutang', 15, 2);
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
        Schema::dropIfExists('supplier_benang');
    }
};
