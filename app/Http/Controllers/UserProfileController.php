<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  
use App\Models\Penyakit; 
use App\Models\HasilDiagnosa;

class UserProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();

        $namaProfil = $user->name; 
        $emailProfil = $user->email; 
        $usiaProfil = null; 

        $riwayatDiagnosaUser = HasilDiagnosa::where('user_id', $user->id)
                                        ->with('penyakit') 
                                        ->orderBy('created_at', 'desc') 
                                        ->paginate(5); 
                                        
        return view('diagnosa.profile.show', compact(
            'namaProfil',
            'emailProfil',
            'usiaProfil', 
            'riwayatDiagnosaUser'
        ));
    }

}