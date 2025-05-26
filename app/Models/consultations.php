<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultations extends Model {
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'description',
        'status_pembayaran',
        'status_konsultasi',
        'diagnosis',
        'price',
    ];
    public function patient() {
        return $this->belongsTo(patients::class);
    }

    public function payment() {
        return $this->hasOne(payments::class, 'consultation_id');
    }

    public function schedule() {
        return $this->hasOne(schedules::class, 'consultation_id');
    }
}
