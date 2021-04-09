<?php

namespace App\Http\Controllers;

use App\Drug;
use App\Supply;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.drug.index', [
            'drugs' => Drug::get(),
            'supplies' => Supply::orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $attr = $this->validate(request(), [
            'name' => 'required',
            'bentuk' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'supplies_id' => 'required',
            'consumed_by' => 'required'
        ]);
        Drug::create($attr);
        return back()->with('success', 'Data Berhasil disimpan');
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
    public function edit($id)
    {
        return view('admin.drug.edit', [
            'drug' => Drug::findOrFail($id),
            'supplies' => Supply::orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $attr = $this->validate(request(), [
            'name' => 'required',
            'bentuk' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'supplies_id' => 'required',
            'consumed_by' => 'required'
        ]);
        Drug::findOrFail($id)->update($attr);
        return redirect()->route('drug.index')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Drug::findOrFail($id)->delete();
        return back()->with('success', 'Data Berhasil dihapus');
    }
}
