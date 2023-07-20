<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'name',
        'invoice_name',
        'phone_number',
        'phone_number_detail',
        'cc',
        'nif',
        'invoice_notes',
        'address',
        'postal_code',
        'locality',
        'email',
        'birth',
        'treatment_sheets',
        'sms_reminders',
        'email_reminders',
        'notify_appointment_created',
        'campaigns',
        'photo_access',
        'sns',
        'school',
        'insurance_id',
        'insurance_number'
    ];

    public function insurance()
    {
        return $this->belongsTo(Insurance::class);
    }
}
