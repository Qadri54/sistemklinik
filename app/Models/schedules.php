<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedules extends Model {
    use HasFactory;
    protected $fillable = [
        'consultation_id',
        'doctor_id',
        'date',
        'time',
        'status',
    ];

    public function consultation() {
        return $this->belongsTo(consultations::class, 'consultation_id');
    }


}
