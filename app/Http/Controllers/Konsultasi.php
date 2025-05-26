<?php

namespace App\Http\Controllers;

use App\Models\patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payments;
use App\Models\consultations;
use App\Models\doctors;
use App\Models\schedules;

class Konsultasi extends Controller {

    public function index() {
        $user = Auth::user();
        $doctors = doctors::all();
        $patients = patients::all();
        $consultations = $user->patient->consultations()->with('patient')->latest()->get();

        return view('pasien.buatjanji', compact('consultations', 'doctors', 'patients'));
    }

    // view konsultasi dari resepsionis
    public function create() {
        $user = Auth::user();
        $doctors = doctors::all();
        $patients = patients::all();
        return view('resepsionis.addJadwalKonsultasi', compact('doctors', 'patients'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'keluhan' => 'required|string|min:10',
            'dokter_id' => 'required|exists:doctors,id',
            'tanggal' => 'required|date',
            'jadwal' => 'required|date_format:H:i',
            'payment_method' => 'required|in:online,offline',
            'status_pembayaran' => 'required|in:unpaid,paid',
            'patient_id' => 'nullable|exists:patients,id', // <- ubah jadi nullable
            'price' => 'required|integer', // <- ubah jadi nullable
        ]);

        // Jika admin yang input (ada patient_id di form)
        if (isset($validated['patient_id'])) {
            $patientId = $validated['patient_id'];
            $redirectRoute = 'dashboard.view.scheduls';
            $successMessage = 'Janji berhasil dibuat dan pembayaran berhasil dilakukan.';
        } else {
            $user = Auth::user();
            $patientId = $user->patient->id ?? null;

            if (!$patientId) {
                return back()->withErrors(['error' => 'Pasien tidak ditemukan.']);
            }

            $validated['payment_method'] = 'online';

            $redirectRoute = 'buatjanji';
            $successMessage = 'Janji berhasil dibuat. Silakan lakukan pembayaran.';
        }


        

        $consultation = Consultations::create([
            'patient_id' => $patientId,
            'description' => $validated['keluhan'],
            'status_konsultasi' => 'belum dimulai',
            'status_pembayaran' => $validated['status_pembayaran'],
            'price' => $validated["price"],
        ]);

        Schedules::create([
            'consultation_id' => $consultation->id,
            'doctor_id' => $validated['dokter_id'],
            'date' => $validated['tanggal'],
            'time' => $validated['jadwal'],
            'status' => 'belum dimulai',
        ]);

        Payments::create([
            'consultation_id' => $consultation->id,
            'payment_method' => $validated['payment_method'],
            'payment_date' => now(),
            'status' => $validated['status_pembayaran'],
        ]);

        return redirect()->route($redirectRoute)->with('success', $successMessage);
    }


    // buat konsultasi dari role pasien
    public function storepasien(Request $request) {
        $validated = $request->validate([
            'keluhan' => 'required|string|min:10',
            'dokter_id' => 'required|exists:doctors,id',
            'tanggal' => 'required|date',
            'jadwal' => 'required|date_format:H:i',
        ]);

        $user = Auth::user();
        $patient = $user->patient;

        $consultation = consultations::create([
            'patient_id' => $patient->id,
            'description' => $validated['keluhan'],
            'status konsultasi' => 'belum dimulai',
            'status pembayaran' => 'unpaid',
        ]);

        schedules::create([
            'consultation_id' => $consultation->id,
            'doctor_id' => $validated['dokter_id'],
            'date' => $validated['tanggal'],
            'time' => $validated['jadwal'],
            'status' => 'belum dimulai',
        ]);

        Payments::create([
            'consultation_id' => $consultation->id,
            'payment_method' => 'online',
            'payment_date' => now(),
            'status' => 'unpaid',
        ]);

        return redirect()->route('buatjanji')->with('success', 'janji berhasil dibuat. Silakan lakukan pembayaran.');
    }



}
