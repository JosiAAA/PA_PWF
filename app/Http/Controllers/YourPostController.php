<?php

namespace App\Http\Controllers;
use App\Models\YourPost;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class YourPostController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->route('id');
    
        $postingan = DB::table('list_donasi')->where('pemilik', $id)->get();
        // $komentar = \App\Models\komentar::where('target', $id)->get();
    
        return view('postinganuser', ['postingan' => $postingan]);
    }
    
}
