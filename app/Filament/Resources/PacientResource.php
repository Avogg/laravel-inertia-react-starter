<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PacientResource\Pages;
use App\Filament\Resources\PacientResource\RelationManagers;
use App\Models\Insurance;
use App\Models\Pacient;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Date;

class PacientResource extends Resource
{
    protected static ?string $model = Pacient::class;

    protected static ?string $label = "Pacientes";

    protected static ?string $navigationGroup = 'Gestão';


    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Dados Pessoais')
                    ->schema([
                        TextInput::make('name')->required()->label('Nome')->maxLength(70),
                        DatePicker::make('birth')->required()->label('Data de nascimento'),
                        TextInput::make('cc')->label('Cartão de Cidadão')->numeric()->nullable(),
                        TextInput::make('sns')->label('Número SNS')->numeric()->nullable(),
                        TextInput::make('school')->label('Escola')->nullable(),

                    ])
                    ->columns(2),
                Fieldset::make('Dados de contribuinte')
                    ->schema([
                        TextInput::make('invoice_name')->label('Nome')->maxLength(70),
                        TextInput::make('nif')->nullable()->numeric()->maxLength(9),
                        TextInput::make('address')->nullable()->label('Morada')->maxLength(70),
                        TextInput::make('postal_code')->nullable()->label('Código Postal')->maxLength(8),
                        TextInput::make('locality')->nullable()->label('Localidade')->maxLength(50),

                        Textarea::make('invoice_notes')->nullable()->label('Notas')->columnSpanFull(),
                    ])
                    ->columns(2),
                Fieldset::make('Contactos')
                    ->schema([
                        TextInput::make('father')->nullable()->maxLength(70)->label('Nome do Pai')->columnSpanFull(),
                        TextInput::make('mother')->nullable()->maxLength(70)->columnSpanFull()->label('Nome da Mãe'),
                        TextInput::make('email')->nullable()->email()->label('Email')->columnSpanFull(),
                        TextInput::make('phone_number')->label('Número de telemóvel')->required()->numeric()->maxLength(14),
                        TextInput::make('phone_number_detail')->label('Observações')->placeholder('Ex: Número do pai')->nullable()->maxLength(120),
                    ])
                    ->columns(2),
                Fieldset::make('Seguro de saúde')
                    ->schema([
                        Select::make('insurance_id')
                            ->nullable()
                            ->label('Seguro')
                            ->options(Insurance::all()->pluck('name', 'id'))
                            ->searchable(),
                        TextInput::make('insurance_number')
                            ->label('Número')
                            ->numeric()
                            ->nullable(),
                    ])
                    ->columns(2),
                Fieldset::make('Consentimento')
                    ->schema([
                        Toggle::make('sms_reminders')->default(false)->label('Avisos SMS'),
                        Toggle::make('notify_appointment_created')->default(false)->label('Avisos via email'),
                        Toggle::make('campaigns')->default(false)->label('Campanhas'),
                        Toggle::make('photo_access')->default(false)->label('Pode ser fotografado(a)'),

                    ])
                    ->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome'),
                TextColumn::make(
                    'birth'
                )->formatStateUsing(function (string $state) {
                    if ($state) {
                        $diff  = Carbon::parse($state)->diff(now());
                        return $diff->y . ' anos ' . $diff->m . ' meses ' . $diff->d . " dias (" . Carbon::parse($state)->format('d/m/Y') . ")";
                    }
                })
                    ->label('Anos')
                    ->alignLeft(),
                TextColumn::make('phone_number')
                    ->label('Contacto')

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPacients::route('/'),
            'create' => Pages\CreatePacient::route('/create'),
            'view' => Pages\ViewPacient::route('/{record}'),
            'edit' => Pages\EditPacient::route('/{record}/edit'),
        ];
    }
}
