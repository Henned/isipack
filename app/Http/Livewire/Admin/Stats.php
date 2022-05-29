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

    public function getOnlineUsers()
    {
        $now = Carbon::now()->getTimestamp();
        $tenMinutes = Carbon::now()->subMinutes(10)->getTimestamp();
        $onlineUsers = DB::table('sessions')->whereBetween('last_activity',[$tenMinutes, $now])->get();

        return $onlineUsers->count();
    }

    public function getMonthlyVisitors()
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
        $columnChartModel = (new ColumnChartModel())
            ->setTitle('Besucher in den letzten 30 Tagen')
            ->withoutLegend()
        ;

        $colorArray = [
            '#fcff5d',
            '#7dfc00',
            '#0ec434',
            '#228c68',
            '#8ad8e8',
            '#235b54',
            '#29bdab',
            '#3998f5',
            '#37294f',
            '#277da7',
            '#3750db',
            '#f22020',
            '#991919',
            '#ffcba5',
            '#e68f66',
            '#c56133',
            '#96341c',
            '#632819',
            '#ffc413',
            '#f47a22',
            '#2f2aa0',
            '#b732cc',
            '#772b9d',
            '#f07cab',
            '#d30b94',
            '#edeff2',
            '#c2a4b4',
            '#946aa2',
            '#5d4c86',
            '#f6ad55'
        ];
        
        $reversed_array = array_reverse($array);

        foreach ($array as $key => $visit) {
            if ($key === 0) {
                $columnChartModel->addColumn('Heute', $visit, $colorArray[$key]);
            }elseif ($key === 1){
                $columnChartModel->addColumn('Gestern', $visit, $colorArray[$key]);
            }elseif ($visit != 0){
                $columnChartModel->addColumn('Vor ' .$key .' Tagen', $visit, $colorArray[$key]);
            }
        }

        return $columnChartModel;
    }

    public function render()
    {
        $onlineUsers = $this->getOnlineUsers() - 1;
        $columnChartModel = $this->getMonthlyVisitors();

        return view('livewire.admin.stats', ['columnChartModel' => $columnChartModel, 'onlineUsers' => $onlineUsers])->layout('layouts.app');
    }
}
