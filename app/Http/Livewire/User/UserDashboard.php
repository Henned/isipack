<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Component
{
    public function render()
    {

        $orders = Order::where('user_id', Auth::user()->id)->get();
        setlocale(LC_TIME, 'German');
        return view('livewire.user.user-dashboard', ['orders' => $orders])->layout('layouts.app');
    }
}
