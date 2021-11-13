<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $name = "harun";
    public $header = "livew ire test";
    public $slot = "livew ire slot";

    public function render()
    {
        return view('livewire.counter');
    }
}
