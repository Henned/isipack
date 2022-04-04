<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Visitor;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class Stats extends Component
{
    public function render()
    {
        $a = 0;
        $array = array();
        do {
            $yesterday = Carbon::now()->subDays($a)->toDateString();
            $visitors = Visitor::where('date', $yesterday)->get();
            $visitorCount = $visitors->count();
            array_push($array, $visitorCount);
            $a += 1;
        } while ($a <= 30);
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
                $columnChartModel->addPoint('Vor ' .$key .' Tagen', $visit);
            }
        }


        return view('livewire.admin.stats', ['columnChartModel' => $columnChartModel])->layout('layouts.app');
    }
}
