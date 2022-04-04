<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Upload extends Component
{
    public $fileName;
    
    public function render()
    {
        return view('livewire.admin.upload')->layout('layouts.app');
    }
}
