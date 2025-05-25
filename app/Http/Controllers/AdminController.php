<?php

namespace App\Http\Controllers;

use App\Models\doctors;
use App\Models\schedules;
use App\Models\consultations;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\patients;

class AdminController extends Controller {
    public function index() {
        return view('admin.admin_panel');
    }

    // view daftar pasien
    public function getAllPatients() {
        $patients = patients::all(); // mengambil semua data pasien
        return view('admin.daftarPasien', compact('patients'));
    }

    // Method delete (hapus data pasien)
    public function destroyPatients($id) {
        $patient = patients::findOrFail($id);
        $patient->delete();

        return redirect()->route('admin.patients')->with('success', 'Data pasien berhasil dihapus.');
    }


    // view daftar dokter
    public function getAllDoctors() {
        $doctors = doctors::all(); // mengambil semua data pasien
        return view('admin.daftarDoctor', compact('doctors'));
    }

    // view tambah dokter
    public function createdokter() {
        return view('admin.addDokter');
    }

    // menambah dokter
    public function store_dokter(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'specialization' => ['required', 'string', 'max:255'],
        ]);

        $dokter = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'dokter', // assign role pasien
        ]);

        doctors::create([
            'name' => $validated['name'],
            'specialization' => $validated['specialization'],
            'license_number' => '00' . $dokter->id,
            'user_id' => $dokter->id,
        ]);

        return redirect()->route('admin.create.doctors')->with('success', 'Dokter berhasil ditambahkan.');
    }


    public function create_resepsionis() {
        return view('admin.create_resepsionis');
    }
    // menambah resepsionis
    public function store_resepsionis(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'resepsionis',
        ]);

        return redirect(route('user'));
    }

    // delete dokter
    public function delete_dokter($id) {
        $dokter = doctors::find($id);
        $dokter->delete();
        return redirect()->route('admin.doctors')->with('success', 'Dokter berhasil dihapus.');
    }

    // view daftar jadwal
    public function getAllScheduls() {
        $consultations = consultations::all(); // mengambil semua data pasien
        $doctors = doctors::all(); // mengambil semua data pasien

        return view('admin.jadwalPasien', compact('consultations', 'doctors'));
    }

    // menambah jadwal konsultasi
    public function store_scheduls(Request $request) {
        $validated = $request->validate([
            'consultation_id' => 'required|exists:consultations,id',
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'time' => 'required',
            'status' => 'required|in:belum selesai,selesai',
        ]);

        schedules::create($validated);

        return redirect()->route('admin.view.scheduls')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function getAllConsultations() {
        $consultations = consultations::with('patient.user')->latest()->get();
        return view('admin.daftarKonsultasi', compact('consultations'));
    }

    // Menghapus konsultasi
    public function deleteConsultation($id) {
        $consultation = consultations::findOrFail($id);
        $consultation->delete();

        return back()->with('success', 'Konsultasi berhasil dihapus.');
    }


}
