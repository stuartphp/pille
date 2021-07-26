<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Fullscreen extends Component
{
    public function fullscreen()
    {
        if(session()->has('fullscreen'))
        {
            session()->forget('fullscreen');
        }else{
            session()->push('fullscreen', 'true');
        }
    }
    public function render()
    {
        return view('livewire.fullscreen');
    }
}
