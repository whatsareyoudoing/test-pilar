<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class Soal2Controller extends Controller
{
    public function index()
    {
        $karyawan=Karyawan::orderBy('id','Desc')->get();
        $karyawan_edit=null;
        return view('soal2.index',['karyawan'=>$karyawan,'karyawan_edit'=>$karyawan_edit]);
    }

    public function edit($id)
    {
        $karyawan=Karyawan::orderBy('id','Desc')->get();
        $karyawan_edit = Karyawan::where('id',$id)->first();
        return view('soal2.index', compact('karyawan','karyawan_edit'));
    }

    public function create(Request $request)
    {

        $id=$request->input('id');
        $searchKaryawan = ['id' => $id];
        try {
            $newData = [
                'nama_karyawan' => $request->input('nama_karyawan'),
                'alamat_karyawan' => $request->input('alamat_karyawan')
            ];

            Karyawan::createKaryawan($searchKaryawan, $newData);
            return redirect()->route('soal2');

        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

    }

    // Delete operation
    public function delete($id)
    {
        $karyawan = Karyawan::getKaryawan($id);
        $karyawan->deleteKaryawan();
        return redirect()->route('soal2');
    }
}
