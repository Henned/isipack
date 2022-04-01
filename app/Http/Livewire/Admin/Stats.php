<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class Stats extends Component
{
    public function render()
    {
        $b = 0;
        $a = 24;
        $array = array();
        do {
            $today = Carbon::now()->subHours($b)->getTimestamp();
            $yesterday = Carbon::now()->subHours($a)->getTimestamp();
            $session = DB::table('sessions')->whereBetween('last_activity', [$yesterday, $today])->get();
            $visitorCount = $session->count();
            array_push($array, $visitorCount);
            $b += 24;
            $a += 24;
        } while ($a <= 168);

        $columnChartModel = (new LineChartModel())

            ->singleLine()

            ->setTitle('Besucher in den letzten 30 Tagen')

            ->addPoint('', 0)

            ->addPoint('Letzten 72 Stunden', $array[2])

            ->addPoint('Letzten 48 Stunden', $array[1])

            ->addPoint('Letzten 24 Stunden', $array[0])

        ;


        return view('livewire.admin.stats', ['columnChartModel' => $columnChartModel])->layout('layouts.app');
    }
}
