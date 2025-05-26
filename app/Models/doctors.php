<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctors extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id', 
        'specialization',
        'license_number',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function consultations() {
        return $this->hasMany(consultations::class);
    }

    public function schedules() {
        return $this->hasMany(schedules::class);
    }

}
