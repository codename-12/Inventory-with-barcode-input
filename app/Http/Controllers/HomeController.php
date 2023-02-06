<?php

namespace App\Http\Controllers;
use App\Models\GJpenerimaan_kain;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $penerimaanPerBulan = penerimaan_kain::selectRaw('MONTH(tanggal) as bulan, SUM(KG) as total_kg')
            ->groupBy('bulan')
            ->get();

        return view('home');
    }
}
