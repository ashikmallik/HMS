<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\PrescriptionMedicine;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Medicine;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::with('appointment.patient', 'doctor')->latest()->paginate(10);
        return view('prescriptions.index', compact('prescriptions'));
    }

    public function create()
    {
        $appointments = Appointment::with('patient')->get();
        $doctors = Doctor::all();
        $medicines = Medicine::all();
        return view('prescriptions.create', compact('appointments', 'doctors', 'medicines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required',
            'doctor_id' => 'required',
            'symptoms' => 'nullable',
            'diagnosis' => 'nullable',
            'advice' => 'nullable',
        ]);

        $prescription = Prescription::create($request->only(['appointment_id', 'doctor_id', 'symptoms', 'diagnosis', 'advice']));

        // Save medicines
        foreach ($request->medicines as $index => $med) {
            PrescriptionMedicine::create([
                'prescription_id' => $prescription->id,
                'medicine_id' => $med['medicine_id'],
                'dosage' => $med['dosage'],
                'duration' => $med['duration'],
                'instruction' => $med['instruction'],
            ]);
        }

        return redirect()->route('prescriptions.index')->with('success', 'Prescription created');
    }
}

