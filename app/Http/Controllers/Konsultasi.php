<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payments;
use App\Models\consultations;

class Konsultasi extends Controller {
    
    public function index() {
        $user = Auth::user();
        $consultations = $user->patient->consultations()->with('patient')->latest()->get();

        return view('konsultasi.index', compact('consultations'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'keluhan' => 'required|string|min:10',
        ]);

        $user = Auth::user();
        $patient = $user->patient;

        $consultation = consultations::create([
            'patient_id' => $patient->id,
            'description' => $validated['keluhan'],
            'status konsultasi' => 'belum dimulai',
            'status pembayaran' => 'unpaid',
        ]);

        Payments::create([
            'consultation_id' => $consultation->id,
            'payment_method' => 'online',
            'payment_date' => now(),
            'status' => 'unpaid',
        ]);

        return redirect()->route('konsultasi.pasien')->with('success', 'Konsultasi berhasil. Silakan lakukan pembayaran.');
    }


    
}
