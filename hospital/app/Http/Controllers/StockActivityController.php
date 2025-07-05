<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\StockActivity;
use Illuminate\Support\Facades\Auth;

class StockActivityController extends Controller
{
   public function index()
{
    $stockIn = StockActivity::where('type', 'in')->sum('quantity');
    $stockOut = StockActivity::where('type', 'out')->sum('quantity');
    $totalItems = Medicine::count();
    $lowStock = Medicine::where('stock', '<=', 10)->count();

    $activities = StockActivity::with(['medicine', 'user'])
        ->latest()
        ->take(10)
        ->get();

    $medicines = Medicine::all();

    // আজকের তারিখের জন্য stock in count per medicine
    $today = now()->startOfDay();

    $todaysStockInCounts = StockActivity::selectRaw('medicine_id, SUM(quantity) as total_in')
        ->where('type', 'in')
        ->where('created_at', '>=', $today)
        ->groupBy('medicine_id')
        ->pluck('total_in', 'medicine_id');

    return view('stock.index', compact(
        'stockIn', 'stockOut', 'totalItems', 'lowStock', 'activities', 'medicines', 'todaysStockInCounts'
    ));
}

    // Stock In form post handler
    public function stockInStore(Request $request)
    {
        $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string|max:255',
        ]);

        $medicine = Medicine::findOrFail($request->medicine_id);

        $medicine->stock += $request->quantity;
        $medicine->save();

        StockActivity::create([
            'medicine_id' => $medicine->id,
            'type' => 'in',
            'quantity' => $request->quantity,
            'user_id' => Auth::id(),
            'note' => $request->note,
        ]);

        return redirect()->route('stock.index')->with('success', 'Stock added successfully.');
    }

    // Stock Out form post handler
    public function stockOutStore(Request $request)
    {
        $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string|max:255',
        ]);

        $medicine = Medicine::findOrFail($request->medicine_id);

        if ($medicine->stock < $request->quantity) {
            return back()->withErrors(['quantity' => 'Insufficient stock available.'])->withInput();
        }

        $medicine->stock -= $request->quantity;
        $medicine->save();

        StockActivity::create([
            'medicine_id' => $medicine->id,
            'type' => 'out',
            'quantity' => $request->quantity,
            'user_id' => Auth::id(),
            'note' => $request->note,
        ]);

        return redirect()->route('stock.index')->with('success', 'Stock reduced successfully.');
    }
}
