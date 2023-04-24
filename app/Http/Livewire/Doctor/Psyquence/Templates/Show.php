<?php

namespace App\Http\Livewire\Doctor\Psyquence\Templates;

use App\Models\Template;
use App\Models\TemplateImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;
    public $name;
    public $is_public;
    public $psyquence;
    public $photo;
    public function submit() {
        $data = $this->validate([
            'name' => 'required|min:3|max:30',

        ]);

        $psyquence = $this->psyquence->update($data);
    }

    public function addPhoto() {
        $data = $this->validate(['photo' => 'required|image']);

        if($this->photo != null) {
            $photo = $this->photo->store('uploads', 'public');
            $data['photo'] = "/storage/" .$photo;
        }

        $order = TemplateImage::where('template_id', $this->psyquence->id)->count() + 1;
        TemplateImage::create([
            'template_id' => $this->psyquence->id,
            'image' => $data['photo'],
            'order' => $order,
        ]);
    }

    public function mount(Template $psyquence) {

        $this->psyquence = $psyquence;
        $this->fill($psyquence);
    }
    public function render()
    {
        return view('livewire.doctor.psyquence.templates.show');
    }
}
