<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GajiController extends Controller
{
    public function index()
    {
    $gaji = Gaji::all();
    return view('dashboard', ['gaji'=>$gaji]);
    }

    public function create()
    {
        return view('tambahdata');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama'=>'required',
            'umur'=>'required',
            'gaji'=>'required'
        ]);

        Gaji::create($validateData);
        return redirect('/dashboard/gaji')->with('success', 'Berhasil Menambahkan');

       
    }

    public function edit(gaji $gaji)
    {
        return view('editgaji', [
            'gaji' => $gaji,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gaji $gaji)
    {
        $validatedData = $request->validate([
            'nama'=>'required',
            'umur'=>'required',
            'gaji'=>'required'
        ]);

        $gaji->update($validatedData);

        return redirect('/dashboard/gaji')->with('success', 'Produk berhasil diupdate');
        
    }

    public function destroy(Gaji $gaji)
    {
        $gaji->delete();
        return redirect('/dashboard/gaji')->with('success', 'Berhasil Dihapus');
    }
}
