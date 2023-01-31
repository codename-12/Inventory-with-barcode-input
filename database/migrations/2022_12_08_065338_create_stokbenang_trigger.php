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
        DB::unprepared('
        CREATE TRIGGER `penerimaan` AFTER INSERT ON `penerimaan_benang`
            FOR EACH ROW 
            BEGIN
            UPDATE master_benang 
            SET BOX_KRG= BOX_KRG + NEW.BOX_KRG,
             KG= KG + NEW.KG,
             BALE= BALE + NEW.BALE
             WHERE jenis_benang = NEW.jenis_benang && LOT = NEW.LOT;
            END 
        ');

        DB::unprepared('
        CREATE TRIGGER `pengiriman` AFTER INSERT ON `pengiriman_benang`
            FOR EACH ROW 
            BEGIN
	        UPDATE master_benang 
	        SET BOX_KRG= BOX_KRG - NEW.BOX_KRG,
 	        KG= KG - NEW.KG,
	        BALE= BALE - NEW.BALE
 	        WHERE jenis_benang = NEW.jenis_benang && LOT = NEW.LOT && id_supplier = id_supplier;
            END
        ');

        DB::unprepared('
        CREATE TRIGGER `pembelian` AFTER INSERT ON `bpb_benang`
            FOR EACH ROW BEGIN
            UPDATE supplier_benang 
            SET 
            hutang = hutang + NEW.harga
            WHERE supplier_benang.id = NEW.id_supplier;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `penerimaan`');
        DB::unprepared('DROP TRIGGER `pengiriman`');
    }
};
