<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\list_donasi;
use Illuminate\support\Facades\DB;
class SearchController extends Controller
{
    public function index()
        {
            $search = list_donasi::all();
 
            return view('search', ['search' => $search]);
        
        }
        public function edit(string $id)
        {
            $result = DB::table('list_donasi')->where('id',$id)->get();
            // passing data pegawai yang didapat ke view edit.blade.php
            return view('donationPage',['result' => $result]);
        }
}

