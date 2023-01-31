<?php

namespace App\Charts;
use App\Models\penerimaan_kain;     
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PenerimaankainChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        
        $penerimaan_perbulan = Penerimaan_kain::selectRaw('MONTH(tanggal) as month, SUM(KG) as total_kg')
        ->groupBy('month')
        ->get();
        return $this->chart->barChart()
        ->setTitle('Penerimaan Kain per Bulan')
        ->setLabels($penerimaan_perbulan->pluck('month'))
        ->setDataset([
            [
                'name' => 'Total KG',
                'data' => $penerimaan_perbulan->pluck('total_kg')
            ]
        ])
        ->setOptions([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);

    }
}
