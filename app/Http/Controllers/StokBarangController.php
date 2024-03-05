<?php

namespace App\Http\Controllers;

use App\Http\Controllers\StokBarangController;
use App\Models\StokBarang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StokBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    // Get posts where flag is 1
    $StokBarang = StokBarang::where('flag', 1)->latest()->paginate(5);

    // Render view with posts
    return view('StokBarang.index', compact('StokBarang'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('StokBarang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'id_barang'     => 'required',
            'harga'     => 'required',
        ]);


        //create post
        StokBarang::create([
            'id_barang'     => $request->id_barang,
            'harga'     => $request->harga,
            'flag' => 1
        ]);

        //redirect to index
        return redirect()->route('StokBarang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         //get post by ID
        $StokBarang = StokBarang::findOrFail($id);

        //render view with post
        return view('StokBarang.edit', compact('StokBarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'id_barang'     => 'required',
            'harga'     => 'required',
        ]);

                $StokBarang = StokBarang::findOrFail($id);
        //create post
        $StokBarang->update([
            'id_barang'     => $request->id_barang,
            'harga'     => $request->harga,
            'flag' => 1
        ]);

                return redirect()->route('StokBarang.index')->with(['success' => 'Data Berhasil Diubah!']);

    }

    
  public function destroy($id): RedirectResponse
{
    StokBarang::findOrFail($id)->update(['flag' => 0]);

    return redirect()->route('StokBarang.index')->with(['success' => 'Data Berhasil Dihapus!']);
}

}