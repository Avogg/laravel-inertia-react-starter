<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'start_time',
        'end_time',
        'lunch_start',
        'lunch_end',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
