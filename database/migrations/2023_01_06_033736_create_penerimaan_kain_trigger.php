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
        DB::unprepared("
        CREATE TRIGGER `Penerimaan_kain` AFTER INSERT ON `penerimaan_kain`
        FOR EACH ROW CASE 
WHEN NEW.jenis_stock = 'stock_polos' THEN
INSERT INTO stock_polos (kode_barang,id_customer,jenis_kain,warna,kop,LOT,ROL,id_penerimaan,id_pengiriman,keterangan) VALUES(
    NEW.kode_barang,
    NEW.id_customer,
    NEW.jenis_kain,
    NEW.warna,
    NEW.kop,
    NEW.LOT,
    NEW.ROL,
   	NEW.id,
    NULL,
    NEW.keterangan
);
WHEN NEW.jenis_stock = 'bs_polos' THEN
INSERT INTO bs_polos (kode_barang,id_customer,jenis_kain,warna,kop,LOT,ROL,id_penerimaan,id_pengiriman,keterangan) VALUES(
    NEW.kode_barang,
    NEW.id_customer,
    NEW.jenis_kain,
    NEW.warna,
    NEW.kop,
    NEW.LOT,
    NEW.ROL,
   	NEW.id,
    NULL,
    NEW.keterangan
);
WHEN NEW.jenis_stock = 'stock_printing' THEN
INSERT INTO stock_printing (kode_barang,id_customer,jenis_kain,warna,kop,LOT,ROL,id_penerimaan,id_pengiriman,keterangan) VALUES(
    NEW.kode_barang,
    NEW.id_customer,
    NEW.jenis_kain,
    NEW.warna,
    NEW.kop,
    NEW.LOT,
    NEW.ROL,
   	NEW.id,
    NULL,
    NEW.keterangan
);
WHEN NEW.jenis_stock = 'bs_printing' THEN
INSERT INTO bs_printing (kode_barang,id_customer,jenis_kain,warna,kop,LOT,ROL,id_penerimaan,id_pengiriman,keterangan) VALUES(
    NEW.kode_barang,
    NEW.id_customer,
    NEW.jenis_kain,
    NEW.warna,
    NEW.kop,
    NEW.LOT,
    NEW.ROL,
   	NEW.id,
    NULL,
    NEW.keterangan
);
END CASE
");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `Penerimaan_kain`');
    }
};
