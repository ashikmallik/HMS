<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\Medicine;
use App\Models\PrescriptionMedicine;

class PrescriptionMedicineController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::with('medicines')->get();
        return view('prescription_medicines.index', compact('prescriptions'));
    }

    public function create()
    {
        $prescriptions = Prescription::all();
        $medicines = Medicine::all();
        return view('prescription_medicines.create', compact('prescriptions', 'medicines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prescription_id' => 'required|exists:prescriptions,id',
            'medicine_id' => 'required|exists:medicines,id',
            'dosage' => 'required|string',
            'frequency' => 'required|string',
            'duration' => 'required|string',
        ]);

        PrescriptionMedicine::create($request->all());

        return redirect()->route('prescription-medicines.index')->with('success', 'Medicine added to prescription successfully.');
    }

    public function show($id)
    {
        $prescription = Prescription::with('medicines')->findOrFail($id);
        return view('prescription_medicines.show', compact('prescription'));
    }

    public function edit($id)
    {
        $prescriptionMedicine = PrescriptionMedicine::findOrFail($id);
        $prescriptions = Prescription::all();
        $medicines = Medicine::all();
        return view('prescription_medicines.edit', compact('prescriptionMedicine', 'prescriptions', 'medicines'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prescription_id' => 'required|exists:prescriptions,id',
            'medicine_id' => 'required|exists:medicines,id',
            'dosage' => 'required|string',
            'frequency' => 'required|string',
            'duration' => 'required|string',
        ]);

        $prescriptionMedicine = PrescriptionMedicine::findOrFail($id);
        $prescriptionMedicine->update($request->all());

        return redirect()->route('prescription-medicines.index')->with('success', 'Prescription medicine updated.');
    }

    public function destroy($id)
    {
        $prescriptionMedicine = PrescriptionMedicine::findOrFail($id);
        $prescriptionMedicine->delete();

        return redirect()->route('prescription-medicines.index')->with('success', 'Prescription medicine deleted.');
    }
}

