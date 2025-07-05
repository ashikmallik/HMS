<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::latest()->paginate(10);
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Patient::create([
            'patient_id' => 'PT' . strtoupper(Str::random(6)),
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'gender' => $request->gender,
            'age' => $request->age,
            'blood_group' => $request->blood_group,
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient added successfully');
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient updated');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->back()->with('success', 'Patient deleted');
    }
}
