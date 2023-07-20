<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Http\Service\ScheduleService;
use App\Models\Appointment;
use App\Models\Area;
use App\Models\Pacient;
use App\Models\User;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Gestão';

    protected static ?string $label = "Marcações";

    public static function form(Form $form): Form
    {

        return $form
            ->schema([

                Select::make('area_id')
                    ->label('Area de atuação')
                    ->reactive()
                    ->options(Area::all()->pluck('name', 'id')),
                Select::make('user_id')
                    ->label('Médico(a)')
                    ->reactive()
                    ->options(function (callable $get) {
                        $area = Area::find($get('area_id'));

                        if (!$area) {
                            return User::where('is_doctor', 1)->pluck('name', 'id')->toArray();
                        }

                        return $area->users->pluck('name', 'id');
                    }),

                DatePicker::make('date')
                    ->reactive()
                    ->minDate(today()),

                Select::make('happens_at')
                    ->label('Hora')
                    ->reactive()
                    ->options(function (callable $get, callable $set) use ($form) {
                        $doctor = User::find($get('user_id'));
                        $area = Area::find($get('area_id'));
                        $date = Carbon::parse($get('date'))->toDateString();
                        if (!$doctor || !$area) {
                            return [];
                        }

                        return ScheduleService::getSlots($doctor, $date, $area, $get('date'));
                    })->afterStateHydrated(function (Select $component, $state) {
                        if ($state) {
                            $component->state($state->toDateTimeString());
                        }
                    }),

                Select::make('pacient_id')
                    ->label('Paciente')
                    ->reactive()
                    ->options(Pacient::all()->pluck('name', 'id')),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('happens_at')->label('Data e Hora'),
                TextColumn::make('user.name')->label('Médico'),
                TextColumn::make('pacient.name')->label('Paciente'),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
