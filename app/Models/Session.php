<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'template_id'
    ];

    public function images() {
        return $this->hasMany(SessionImage::class);
    }

    public function template() {
        return $this->belongsTo(Template::class);
    }
}
