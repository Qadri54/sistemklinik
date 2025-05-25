<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model {
    use HasFactory;

    protected $fillable = [
        'consultation_id',
        'status',
        'payment_method',
        'payment_date',
    ];


    public function consultation() {
        return $this->belongsTo(consultations::class);
    }
}
