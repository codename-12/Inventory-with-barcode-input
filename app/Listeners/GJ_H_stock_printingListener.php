<?php

namespace App\Listeners;
use App\Models\GJ_H_stock_printing;
use App\Models\GJ_stock_printing;
use App\Models\GJpengiriman_kain;
use App\Models\GJpenerimaan_kain;
use App\Models\DFregkain_printing;
use App\Events\GJpengirimanKainSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GJ_H_stock_printingListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(GJpengirimanKainSaved $event)
    {
        $kode_kain = json_decode($event->pengiriman->kode_kain, true);

        foreach ($kode_kain as $kode) {
            $penerimaan_kain = GJpenerimaan_kain::where('kode_kain', $kode)
                ->orderBy('tanggal_masuk', 'desc')
                ->first();
            $regkain = DFregkain_printing::where('kode_kain', $kode)->first();
            $kg = $regkain ? $regkain->KG : null;
            $cek_kain = GJ_stock_printing::where('kode_kain', $kode)->first();

            if ($cek_kain || $penerimaan) {
                $stok_printing = new GJ_H_stok_printing();
                $stok_printing->kode_kain = $kode;
                $stok_printing->kg = $kg;
                $stok_printing->tanggal_masuk = $penerimaan_kain->tanggal_masuk;
                $stok_printing->tanggal_kirim = $event->pengiriman->tanggal_kirim;
                $stok_printing->keterangan = 'Pengiriman ke GJ';
                $stok_printing->save();
                GJ_stock_printing::whereIn('kode_kain', $kode_kain)->delete();
            }
        }
    }
}
