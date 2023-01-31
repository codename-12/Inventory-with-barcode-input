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
        CREATE TRIGGER `pengiriman_kain` AFTER INSERT ON `pengiriman_kain`
 FOR EACH ROW CASE 
WHEN NEW.jenis_kain = 'stock_polos' THEN
	UPDATE stock_polos SET 
	id_pengiriman = NEW.id
	WHERE kode_barang = NEW.kode_barang;
WHEN NEW.jenis_kain = 'bs_polos' THEN
	UPDATE bs_polos SET 
	id_pengiriman = NEW.id
	WHERE kode_barang = NEW.kode_barang;
WHEN NEW.jenis_kain = 'stock_printing' THEN
	UPDATE stock_printing SET 
	id_pengiriman = NEW.id
	WHERE kode_barang = NEW.kode_barang;
WHEN NEW.jenis_kain = 'bs_printing' THEN
    UPDATE bs_printing SET 
	id_pengiriman = NEW.id
	WHERE kode_barang = NEW.kode_barang;
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
        DB::unprepared('DROP TRIGGER `pengiriman_kain`');
    }
};
