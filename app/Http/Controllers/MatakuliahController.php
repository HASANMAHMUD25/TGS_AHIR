<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
use DB;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           // menambahkan
           $ar_matakuliah = DB::table('matakuliah')->get();
           return view('matakuliah.index',compact('ar_matakuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matakuliah = Matakuliah::findOrFail($id); // Mengambil data matakuliah berdasarkan ID
        return view('matakuliah.show', compact('matakuliah')); // Mengirim data matakuliah ke tampilan show.blade.php
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('matakuliah')
        ->where('id','=',$id)->get();
        return view('matakuliah.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('matakuliah')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'nilai'=>$request->nilai,
            ]
            );
            return redirect('/matakuliah'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //menghapus data
         DB::table('matakuliah')->where('id',$id)->delete(); 
         return redirect('/matakuliah');
    }
}
