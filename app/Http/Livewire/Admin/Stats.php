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
        } while ($a <= 720);
        $columnChartModel = (new LineChartModel())

            ->singleLine()

            ->setTitle('Besucher in den letzten 30 Tagen')

        ;

        $reversed_array = array_reverse($array);

        foreach ($array as $key => $visit) {
            if ($key === 0) {
                $columnChartModel->addPoint('Heute', $visit);
            }elseif ($key === 1){
                $columnChartModel->addPoint('Gestern', $visit);
            }else{
                $columnChartModel->addPoint('Vor ' .$key+1 .' Tagen', $visit);
            }
        }


        return view('livewire.admin.stats', ['columnChartModel' => $columnChartModel])->layout('layouts.app');
    }
}
