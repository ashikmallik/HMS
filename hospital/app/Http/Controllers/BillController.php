<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Appointment;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::with('appointment.patient')->latest()->paginate(10);
        return view('bills.index', compact('bills'));
    }

    public function create()
    {
        $appointments = Appointment::with('patient')->get();
        return view('bills.create', compact('appointments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required',
            'doctor_fee' => 'required|numeric',
            'medicine_cost' => 'nullable|numeric',
            'lab_test_cost' => 'nullable|numeric',
            'other_charges' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'paid_amount' => 'nullable|numeric',
        ]);

        $total = $request->doctor_fee + $request->medicine_cost + $request->lab_test_cost + $request->other_charges - $request->discount;
        $due = $total - $request->paid_amount;
        $status = $due <= 0 ? 'paid' : ($request->paid_amount > 0 ? 'partial' : 'unpaid');

        Bill::create([
            'appointment_id' => $request->appointment_id,
            'doctor_fee' => $request->doctor_fee,
            'medicine_cost' => $request->medicine_cost,
            'lab_test_cost' => $request->lab_test_cost,
            'other_charges' => $request->other_charges,
            'discount' => $request->discount,
            'total_amount' => $total,
            'paid_amount' => $request->paid_amount,
            'due_amount' => $due,
            'status' => $status,
        ]);

        return redirect()->route('bills.index')->with('success', 'Bill created successfully');
    }
}
