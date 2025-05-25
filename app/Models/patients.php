<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patients extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'birth_date',
        'address',
        'tipe',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function consultations() {
        return $this->hasMany(consultations::class,'patient_id');
    }
}
