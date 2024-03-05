<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cashier;
use App\Models\StokBarang;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    // Get cashiers
    $Cashier = Cashier::where('flag',1)->get();

    // Get StokBarang with flag 1
    $StokBarang = StokBarang::where('flag', 1)->get();

    // Get drugs with flag 1

    // Render view with data
    return view('Cashier.index', compact('Cashier', 'StokBarang'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()    
    {
        return view('Cashier.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'id_barang' => 'required',
        'jumlah_pesanan' => 'required',
        'harga' => 'required',
        'tanggal_transaksi' => 'required',
    ]);

    // Calculate the total payment
    $total_bayar = $request->harga * $request->jumlah_pesanan;

    // Create the Cashier record
    Cashier::create([
        'id_barang' => $request->id_barang,
        'jumlah_pesanan' => $request->jumlah_pesanan,
        'harga' => $request->harga,
        'tanggal_transaksi' => $request->tanggal_transaksi,
        'total_bayar' => $total_bayar,
        'flag' => 1
    ]);

        //redirect to index
return redirect()->route('Cashier.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function print()
    {
    $Cashier = Cashier::where('flag',1)->get();
            return view('Cashier.print', compact('Cashier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}