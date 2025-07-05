<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicinePurchase;
use App\Models\Medicine;

class MedicinePurchaseController extends Controller
{
    public function index()
    {
        $purchases = MedicinePurchase::with('medicine')->latest()->get();
        return view('medicine_purchases.index', compact('purchases'));
    }

    public function create()
    {
        $medicines = Medicine::all();
        return view('medicine_purchases.create', compact('medicines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        MedicinePurchase::create($request->all());

        // Update medicine stock
        $medicine = Medicine::find($request->medicine_id);
        $medicine->increment('stock', $request->quantity);

        return redirect()->route('medicine-purchases.index')->with('success', 'Purchase added.');
    }
}
