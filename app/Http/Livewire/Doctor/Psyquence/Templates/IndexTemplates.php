<?php

namespace App\Http\Livewire\Doctor\Psyquence\Templates;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Template;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class IndexTemplates extends DataTableComponent
{
    protected $model = Template::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        return Template::
            where('user_id', auth()->user()->id);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nome", "name")
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
                        ->title(fn($row) => 'Ver/Editar')

                        ->html()
                        ->location(fn($row) => route('doctors.psyquence.templates.show', $row))
                        ->attributes(function($row) {
                            return [
                                'class' => 'btn btn-sm',
                            ];
                        }),
                ]),

        ];
    }
}
