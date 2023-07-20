<?php

namespace App\Http\Livewire;

use App\Models\WorkingHour;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class WorkHour extends Component implements HasForms
{
    use InteractsWithForms;



    public $days = [
        1 => 'Segunda-feira',
        2 => 'Terça-feira',
        3 => 'Quarta-feira',
        4 => 'Quinta-feira',
        5 => 'Sexta-feira',
        6 => 'Sábado',
    ];

    public $day;
    public $start_time;
    public $lunch_start;
    public $lunch_end;
    public $end_start;

    public function mount($day)
    {
        $this->day = $day;
        $this->form->fill();
    }
    public function render()
    {
        return view('livewire.work-hour');
    }


    protected function getFormSchema(): array
    {
        return [
            Fieldset::make($this->days[$this->day])
                ->schema([
                    TimePicker::make('start_time')->required(),
                    TimePicker::make('lunch_start')->nullable(),
                    TimePicker::make('lunch_end')->nullable(),
                    TimePicker::make('end_time')->required(),
                ])
        ];
    }

    protected function getFormModel(): string
    {
        return WorkingHour::class;
    }

    public function submit()
    {
        $data = $this->form->getState();
        $data['day'] = $this->day;
        $data['user_id'] = auth()->user()->id;
        WorkingHour::create($data);
        $this->emitUp('refreshParent');

        \Filament\Notifications\Notification::make()
            ->title('Saved successfully')
            ->send();
    }
}
