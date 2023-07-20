<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'user_id',
        'pacient_id',
        'happens_at',
        'ends_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'happens_at' => 'datetime',
        'ends_at' => 'datetime'
    ];


    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pacient()
    {
        return $this->belongsTo(Pacient::class);
    }
}
