<?php

namespace App\Listeners;
use App\Models\GJ_H_bs_printing;
use App\Models\GJ_bs_printing;
use App\Models\GJpengiriman_kain;
use App\Models\GJpenerimaan_kain;
use App\Models\DFregkain_printing;
use App\Events\GJpengirimanKainSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GJ_H_bs_printingListener
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
            $cek_kain = GJ_bs_printing::where('kode_kain', $kode)->first();

            if ($cek_kain && $penerimaan_kain) {
                $stok_polos = new GJ_H_bs_printing();
                $stok_polos->kode_kain = $kode;
                $stok_polos->kg = $kg;
                $stok_polos->tanggal_masuk = $penerimaan_kain->tanggal_masuk;
                $stok_polos->tanggal_kirim = $event->pengiriman->tanggal_kirim;
                $stok_polos->keterangan = 'Pengiriman ke GJ';
                $stok_polos->save();
                GJ_bs_printing::whereIn('kode_kain', $kode_kain)->delete();
            }
        }
    }
}
