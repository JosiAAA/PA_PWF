<?php

namespace App\Http\Controllers;
use App\Models\list_donasi;
use App\Models\komentar;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class KomentarController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->route('id');
    
        $result = DB::table('list_donasi')->where('id', $id)->get();
        $komentar = \App\Models\komentar::where('target', $id)->get();
        $jumlahKomentar = \App\Models\komentar::where('target', $id)->count();

    return view('donationPage', [
        'result' => $result,
        'komentar' => $komentar,
        'jumlahKomentar' => $jumlahKomentar,
    ]);
    }
    
    
    public function store(Request $request)
{
    DB::table('komentar')->insert([
        'pemilik'=>$request->pemilik,
        'komen' => $request->komen,
        'role_pemilik'=> $request->role_pemilik,
        'target'=>$request->target,
        'tanggal' => $request->tanggal,
        'jam'=> $request->jam
    ]);

    return redirect()->back()->with('success', 'Donasi berhasil dilakukan');
}

}
