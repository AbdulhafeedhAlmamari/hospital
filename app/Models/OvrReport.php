<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OvrReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'ovr_number', 'event_date', 'event_time', 'event_location',
        'reporting_department', 'responding_department', 'patient_name',
        'medical_record', 'dob', 'gender', 'patient_type',
        'event_description', 'reporter_name', 'reporter_mobile',
        'reporter_position', 'reporter_email', 'event_category',
        'injury_occurred', 'injury_type', 'admin_response', 'status'
    ];
}
