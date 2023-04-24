<?php

namespace App\Http\Livewire\Doctor\Psyquence\Templates;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Template;
use App\Models\TemplateImage;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class Index extends DataTableComponent
{
    protected $model = TemplateImage::class;

    public $psyquence;

    public function mount(Template $psyquence) {
        $this->psyquence = $psyquence;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultReorderSort('order', 'asc');


        $this->setReorderStatus(true);
        $this->setReorderEnabled();
        $this->setRefreshVisible();
        $this->setRefreshKeepAlive();



    }

    public function builder(): Builder
    {
        return TemplateImage::
            where('template_id', $this->psyquence->id);
    }

    public function reorder($items): void
    {
        foreach ($items as $item) {

            TemplateImage::find((int)$item['value'])->update(['order' => (int)$item['order']]);
        }
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
            ->hideIf(true),
            Column::make("Imagem", "image")
            ->hideIf(true),
            Column::make("Image", "image")
            ->format(
                fn($value, $row, Column $column) => '<img width="150" src="' . asset($row->image) .'"></img>'
            )

            ->html(),

            Column::make('Actions')
            ->label(
                function ($row, Column $column) {
                    $delete = '<button class="btn-sm btn-primary" wire:click="delete(' . $row->id . ')">Remover</button>';
                    return $delete;
                }
            )->html(),

        ];
    }

    public function delete($id) {
        TemplateImage::destroy($id);
    }
}
