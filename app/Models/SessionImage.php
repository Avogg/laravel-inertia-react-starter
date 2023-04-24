<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'notes',
        'order',
        'session_id'
    ];

    public function session() {
        return $this->belongsTo(Session::class);
    }
}
