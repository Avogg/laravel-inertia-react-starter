<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WorkHourShow extends Component
{

    protected $listeners = [
        'refreshParent' => '$refresh',
    ];


    public function render()
    {
        return view('livewire.work-hour-show', [
            'workHours' => auth()->user()->workingHours()->orderBy('day')->get()
        ]);
    }
}
