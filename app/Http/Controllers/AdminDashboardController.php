<?php

namespace App\Http\Controllers; 

use App\Models\User;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Validation\Rules; 

class AdminDashboardController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::whereNotLike('kode_gejala', '%\\_%') 
                           ->orderBy('kode_gejala', 'asc')
                           ->get();

        $gejalaCount = $gejalas->count();

        $penyakits = Penyakit::all();
        $penyakitCount = $penyakits->count();

        return view('admin.dashboard', compact('gejalas', 'gejalaCount', 'penyakits', 'penyakitCount'));
    }

    public function admin()
    {
        $admins = User::whereIn('role', ['admin', 'pakar'])->orderBy('name')->get();
        $adminCount = $admins->count(); 
        return view('admin.admin.index', compact('admins', 'adminCount'));
    }

    public function create()
    {
        return view('admin.admin.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()], 
            'role' => ['required', 'string', 'in:admin,pakar'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'role' => $request->role,
        ]);

        return redirect()->route('admin.admin')->with('success', 'Pengguna admin/pakar berhasil dibuat.');
    }
    
    public function edit(User $admin) 
    {
        if (!in_array($admin->role, ['admin', 'pakar'])) {
        }
        return view('admin.admin.edit', compact('admin')); 
    }

    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $admin->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()], 
            'role' => ['required', 'string', 'in:admin,pakar'], 
        ]);

        $dataToUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $dataToUpdate['password'] = Hash::make($request->password); 
        }

        $admin->update($dataToUpdate);

        return redirect()->route('admin.admin')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroy(User $admin) 
    {
        $admin->delete();

        return redirect()->route('admin.admin')->with('success', 'Pengguna berhasil dihapus.');
    }
}