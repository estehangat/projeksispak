<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  
use App\Models\Penyakit; 

class UserProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();

        $namaProfil = $user->name; 
        $emailProfil = $user->email; 
        
        $usiaProfil = null; 

        $riwayatDiagnosaUser = []; 

        return view('diagnosa.profile.show', compact(
            'namaProfil',
            'emailProfil',
            'usiaProfil', 
            'riwayatDiagnosaUser'
        ));
    }

}