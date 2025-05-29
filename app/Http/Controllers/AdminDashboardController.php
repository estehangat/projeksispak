<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::all();
        $gejalaCount = $gejalas->count();
        $penyakits = Penyakit::all();
        $penyakitCount = $penyakits->count();
        return view('admin.dashboard', compact('gejalas', 'gejalaCount', 'penyakits', 'penyakitCount'));
    }

    public function admin()
    {
        $admins = User::all();
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create($request->all());

        return redirect()->route('admin.admin')->with('success', 'Admin created successfully.');
    }
    
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin = User::findOrFail($id);
        $admin->update($request->all());

        return redirect()->route('admin.admin')->with('success', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.admin')->with('success', 'Admin deleted successfully.');
    }
}
