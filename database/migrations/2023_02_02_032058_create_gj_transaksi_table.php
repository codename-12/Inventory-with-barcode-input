<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan_kain', function (Blueprint $table) {
            $table->id();
            $table
                ->date('tanggal_masuk')
                ->nullable()
                ->default(date('Y-m-d'));
            $table->string('kode_kain')->unique();
            $table
                ->decimal('kg', 15, 2)
                ->nullable()
                ->default(0);
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('kainable_id'); // Kolom polimorfik
            $table->string('kainable_type'); // Kolom polimorfik
            $table->timestamps();

        });

        Schema::create('pengiriman_kain', function (Blueprint $table) {
            $table->id();
            $table
                ->date('tanggal_kirim')
                ->nullable()
                ->default(date('Y-m-d'));
            $table->string('no_po');
            $table->json('kode_kain');
            $table
                ->decimal('kg', 15, 2)
                ->nullable()
                ->default(0);
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
        Schema::dropIfExists('penerimaan_kain');
        Schema::dropIfExists('pengiriman_kain');
    }
};
