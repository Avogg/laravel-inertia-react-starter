<?php

namespace App\Http\Livewire\Doctor\Psyquence\Templates;

use App\Models\Template;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $name;
    public function submit() {
        $data = $this->validate([
            'name' => 'required|min:3|max:30',
        ]);

        $data['user_id'] = auth()->user()->id;

        $psyquence = Template::create($data);

        return redirect()->route('doctors.psyquence.templates.show', $psyquence);

    }
    public function render()
    {
        return view('livewire.doctor.psyquence.templates.create');
    }
}
