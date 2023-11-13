<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TopupController extends Controller
{
    public function topup(Request $request)
{
    $user = Auth::user(); // Get the authenticated user
    $topupId = $request->input('topup_id');
    $topup = $request->input('topup');
        $user->saldo += $topup;
        $user->save();

        return redirect()->back()->with('success', 'Donasi berhasil dilakukan');
}
}
