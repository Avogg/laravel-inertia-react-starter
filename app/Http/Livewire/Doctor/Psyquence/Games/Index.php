<?php

namespace App\Http\Livewire\Doctor\Psyquence\Games;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Session;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class Index extends DataTableComponent
{
    protected $model = Session::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return Session::
            where('user_id',auth()->user()->id);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            ButtonGroupColumn::make('Actions')
            ->attributes(function($row) {
                return [
                    'class' => 'gap-8',
                ];
            })
            ->buttons([

                LinkColumn::make('Edit')
                    ->title(fn($row) => 'Ver')

                    ->html()
                    ->location(fn($row) => route('doctors.psyquence.show', $row))
                    ->attributes(function($row) {
                        return [
                            'class' => 'btn btn-sm',
                        ];
                    }),
            ]),
        ];
    }
}
