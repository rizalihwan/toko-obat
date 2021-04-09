<?php

namespace App\Http\Controllers;

use App\Drug;

class BuyDrugController extends Controller
{
    public function buy()
    {
        return view('customer.buy', [
            'drugs' => Drug::where('stock', '!=', 0)->get()
        ]);
    }

    public function payment($id)
    {
        return view('customer.payment', [
            'drug' => Drug::findOrFail($id)
        ]);
    }

    public function pay($id)
    {
        $drug = Drug::findOrFail($id);
        $drug->update([
            'stock' => $drug->stock - request('jumlah')
        ]);
        return redirect()->route('customer.buy')->with('success', 'Pembelian sukses');
    }
}
