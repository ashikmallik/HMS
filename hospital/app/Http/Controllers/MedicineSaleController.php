<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicineSale;
use App\Models\Medicine;

class MedicineSaleController extends Controller
{
    public function index()
    {
        $sales = MedicineSale::with('medicine')->latest()->get();
        return view('medicine_sales.index', compact('sales'));
    }

    public function create()
    {
        $medicines = Medicine::all();
        return view('medicine_sales.create', compact('medicines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'sale_date' => 'required|date',
        ]);

        // Reduce stock
        $medicine = Medicine::find($request->medicine_id);
        if ($medicine->stock < $request->quantity) {
            return back()->with('error', 'Not enough stock.');
        }

        $medicine->decrement('stock', $request->quantity);

        MedicineSale::create($request->all());

        return redirect()->route('medicine-sales.index')->with('success', 'Sale recorded.');
    }
}
