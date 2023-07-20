<?php

namespace App\Http\Service;

use App\Models\Appointment;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;
use Spatie\OpeningHours\OpeningHours;
use Illuminate\Database\Eloquent\Builder;

class ScheduleService
{

    public static $days = [
        1 => 'monday',
        2 => 'tuesday',
        3 => 'wednesday',
        4 => 'thursday',
        5 => 'friday',
        6 => 'staruday',
        7 => 'sunday'
    ];

    public static function getSlots($user, $date, $area, $appointment = null)
    {
        $endDate = Carbon::parse($date)->addMinutes(40);
        $day = Carbon::parse($date)->dayOfWeekIso;

        $workingDay = $user->workingHours->where('day', $day)->first();

        if (!$workingDay) {
            return [];
        }

        $realDate = "";

        if ($appointment) {
            $realDate = Carbon::parse($appointment)->toDateString();
        }

        $startTime = Carbon::parse($realDate . " " . $workingDay->start_time) ?? null;
        $endTime = Carbon::parse($realDate . " " . $workingDay->end_time) ?? null;
        $lunch_start = Carbon::parse($realDate . " " . $workingDay->lunch_start) ?? null;
        $lunch_end = Carbon::parse($realDate . " " . $workingDay->lunch_end) ?? null;

        if ($lunch_start) {

            $period1 = CarbonPeriod::create($startTime, $area->duration . ' minutes', $lunch_start)->excludeEndDate()->toArray();
            $period2 = CarbonPeriod::create($lunch_end, $area->duration . ' minutes', $endTime)->excludeEndDate()->toArray();

            $merge = array_merge($period1, $period2);
        } else {
            $merge = CarbonPeriod::create($startTime, $area->duration . ' minutes', $endTime)->excludeEndDate()->toArray();
        }


        $slots = [];



        foreach ($merge as $date) {

            $conflictingAppointments = Appointment::where(function (Builder $query) use ($date, $endDate, $appointment) {
                $query->where(function (Builder $query) use ($date, $appointment) {
                    $query->where('happens_at', '<=', $date)
                        ->where('ends_at', '>=', $date)
                        ->where('happens_at', '<>', $appointment);
                })
                    ->orWhere(function (Builder $query) use ($endDate, $appointment) {
                        $query->where('happens_at', '<=', $endDate)
                            ->where('happens_at', '<>', $appointment)
                            ->where('ends_at', '>=', $endDate);
                    });
            })->count();

            if (
                $conflictingAppointments == 0
            ) {
                $slots[$date->toDateTimeString()] = $date->format('H:i');
            }
        }

        if (array_key_exists(Carbon::parse($appointment)->toDateTimeString(), $slots)) {
            $slots[Carbon::parse($appointment)->toDateTimeString()] = Carbon::parse($appointment)->format('H:i');
        }

        return $slots;
    }
}
