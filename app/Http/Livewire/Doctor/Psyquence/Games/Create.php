<?php

namespace App\Http\Livewire\Doctor\Psyquence\Games;

use App\Models\Session;
use App\Models\SessionImage;
use App\Models\Template;
use Livewire\Component;

class Create extends Component
{
    public $templates;
    public $name;
    public $template_id;


    public function submit() {
        $data = $this->validate(
            [
                'name' => 'required|string|min:2|max:40',
                'template_id' => 'required|integer|min:1',

            ]
            );

        $psyquenceGame = Session::create([
            'user_id' => auth()->user()->id,
            'name' => $data['name'],
            'template_id' => $data['template_id'],
        ]);

        $template = Template::find($data['template_id']);

        foreach($template->images as $image) {
            SessionImage::create([
                'image' => $image->image,
                'order' => $image->order,
                'session_id' => $psyquenceGame->id,
            ]);
        }

        return redirect()->route('doctors.psyquence.show', $psyquenceGame);
    }

    public function mount() {
        $this->templates = Template::where('user_id', auth()->user()->id)->get();
    }
    public function render()
    {
        return view('livewire.doctor.psyquence.games.create');
    }
}
