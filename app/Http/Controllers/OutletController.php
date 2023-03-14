<?php

namespace App\Http\Controllers;

use App\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $outlet = Outlet::all();

        return view('outlet.list', [
            'title' => 'Data Outlet',
            'outlet' => $outlet
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outlet.create', [
            'title' => 'New Outlet',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Outlet::create([
        //     'nama' => $request->nama,
        //     'alamat' => $request->alamat,
        //     'no_telp' => $request->no_telp,
        // ]);

        $this->validate($request , [
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|numeric'
        ]);

        Outlet::create($request->all());

        return redirect()->route('outlet.index')->with('message', 'Berhasil Menambahkan Outlet!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $outlet)
    {
        return view('outlet.edit', [
            'title' => 'Edit Outlet',
            'outlet' => $outlet
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $outlet = Outlet::find($id);
        $outlet->update($data);

        $this->validate($request , [
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|numeric'
        ]);

        return redirect()->route('outlet.index')->with('message', 'Berhasil Memperbarui Outlet!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Outlet::find($id);
        $id->delete();


        return redirect()->route('outlet.index')->with('message', 'Berhasil Menghapus Outlet!');
    }
}
