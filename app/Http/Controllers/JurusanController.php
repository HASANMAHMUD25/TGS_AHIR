<?php

namespace App\Http\Controllers;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use DB;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // menambahkan
         $ar_jurusan = DB::table('jurusan')->get();
         return view('jurusan.index',compact('ar_jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate(
            [
            'nip'=>'required|unique:jurusan|numeric', 
            'nama'=>'required|max:50', 
            ],
            //2. menampilkan pesan kesalahan
            //(di slide selanjutnya)
        
            //pesan kesalahan saat invalid data (kelanjutan slide sebelumnya)
            [
                'nip.required'=>'NIP Wajib di Isi', 
                'nip.unique'=>'NIP Tidak Boleh Sama', 
                'nip.numeric'=>'Harus Berupa Angka', 
                'nama.required'=>'Nama Wajib di Isi', 
                ],
                );
                //2. processing form (di slide selanjutnya)
        
                //lanjutan slide sebelumnya
            //2. proses input data tangkap request dari form input
            DB::table('jurusan')->insert(
                [
                'nip'=>$request->nip, 
                'nama'=>$request->nama, 
                ]
                );
                //2.landing page
                return redirect('/jurusan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jurusan = Jurusan::findOrFail($id); // Mengambil data jurusan berdasarkan ID
        return view('jurusan.show', compact('jurusan')); // Mengirim data jurusan ke tampilan show.blade.php
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('jurusan')
        ->where('id','=',$id)->get();
        return view('jurusan.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('jurusan')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
            ]
            );
            return redirect('/jurusan'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //menghapus data
         DB::table('jurusan')->where('id',$id)->delete(); 
         return redirect('/jurusan');
    }
}
