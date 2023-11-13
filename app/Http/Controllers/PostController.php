<?php

namespace App\Http\Controllers;
use App\Models\list_donasi;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
{
    DB::table('list_donasi')->insert([
        'judul'=>$request->judul,
        'pemilik' => $request->pemilik,
        'role_pemilik'=> $request->role_pemilik,
        'link_gambar'=>$request->link_gambar,
        'tanggal' => $request->tanggal,
        'jam'=> $request->jam,
        'deskripsi'=> $request->deskripsi,
        'wilayah'=> $request->wilayah
    ]);

    return redirect('/posting');
}

public function donate(Request $request)
{
    $user = Auth::user(); // Get the authenticated user
    $donationId = $request->input('donation_id');
    $nominal = $request->input('nominal');

    // Check if the user has enough balance
    if ($user->saldo >= $nominal) {
        // Deduct the amount from the user's balance
        $user->saldo -= $nominal;
        $user->save();

        // Update the total_terkumpul in the list_donasi table
        $donation = list_donasi::find($donationId);
        $donation->total_terkumpul += $nominal;
        $donation->jumlah_pendonasi += 1;
        $donation->save();

        return redirect()->back()->with('success', 'Donasi berhasil dilakukan');
    } else {
        return redirect()->back()->with('error', 'Saldo tidak mencukupi');
    }
}
public function destroy(string $id)
    {
        DB::table("list_donasi")->where("id",$id)->delete();
        return redirect()->back()->with('success', 'Donasi berhasil dilakukan');
    }

}
