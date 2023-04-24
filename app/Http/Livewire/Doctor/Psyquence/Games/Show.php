<?php

namespace App\Http\Livewire\Doctor\Psyquence\Games;

use App\Models\Session;
use App\Models\SessionImage;
use App\Models\TemplateImage;
use Livewire\Component;

class Show extends Component
{
    public $psyquenceGame;
    public $psyquenceGameImages;

    public $answers = [];
    public $template;
    public $modal = false;

    public function mount(Session $psyquenceGame) {
        $this->psyquenceGame = $psyquenceGame;
        $this->psyquenceGameImages = $psyquenceGame->images()->orderBy('order', 'asc')->get()->toArray();
        $this->template = $psyquenceGame->template;
        foreach($this->psyquenceGameImages as $image) {
            $this->answers[$image["id"]] = $image['notes'];
        }
    }

    public function updatedAnswers()
    {
        foreach($this->answers as $key=>$answer) {
            TemplateImage::where('id',$key)->update(['notes' => $answer]);
        }
    }


    public function render()
    {
        return view('livewire.doctor.psyquence.games.show');
    }

    public function updateOrder($items) {
        foreach($items as $item) {
            SessionImage::find($item["value"])->update(['order' => $item['order']]);
        }
        $this->psyquenceGameImages = $this->psyquenceGame->images()->orderBy('order', 'asc')->get();
        $images = $this->template->images()->orderBy('order', 'asc')->get();

        $col1 = $this->psyquenceGame->images()->orderBy('order', 'asc')->pluck('image');
        $col2 = $this->template->images()->orderBy('order', 'asc')->pluck('image');

        if($col1->toArray() === $col2->toArray()) {
            $this->modal = true;
        }


    }

    public function shuffle() {

        if(!is_array($this->psyquenceGameImages)) {
            $this->psyquenceGameImages = $this->psyquenceGameImages->toArray();
        }
        shuffle($this->psyquenceGameImages);
    }


}
