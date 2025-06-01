@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('page-title', 'Dashboard')

@section('content')
    <div class="main-content">
        <div class="container background-white p-5 rounded-4 shadow-sm">
            <h1 class="mb-4 fw-bold">Daftar Pengguna</h1>

            <!-- Table -->
            <a href="#" class="btn btn-outline-success mb-3 rounded-pill" data-bs-toggle="modal"
                data-bs-target="#addAdminModal">
                <i class="bi bi-plus-circle"></i> Tambah Pengguna
            </a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-header">
                            <th style="width: 50px;">#</th>
                            <th style="width: 100px;">NAMA</th>
                            <th style="width: 100px;">EMAIL</th>
                            <th style="width: 100px;">ROLE</th>
                            <th style="width: 100px">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td class="text-left">{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $admin->name }}</td>
                                <td class="text-left">{{ $admin->email }}</td>
                                <td class="text-left">{{ $admin->role }}</td>
                                <td class="text-left">
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-warning" title="Edit" data-bs-toggle="modal"
                                            data-bs-target="#editAdminModal{{ $admin->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus" data-bs-toggle="modal"
                                            data-bs-target="#deleteAdminModal{{ $admin->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Admin Modal -->
    <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content custom-modal">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title fw-bold" id="addAdminModalLabel">Tambah Pengguna</h5>
                </div>
                <form action="{{ route('admin.admin.store') }}" method="POST">
                    @csrf
                    <div class="modal-body custom-modal-body">
                        <div class="row g-3">
                            <div class="col-md-12 mb-2">
                                <input type="text" class="form-control custom-input" id="name" name="name"
                                    placeholder="Nama Admin" required>
                            </div>
                            <div class="col-md-12 mb-2">
                                <select class="form-select custom-input" id="role" name="role" required>
                                    <option value="" disabled selected>Pilih Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="pakar">Pakar</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-2">
                                <input type="email" class="form-control custom-input" id="email" name="email"
                                    placeholder="Email Admin" required>
                            </div>
                            <div class="col-md-12 mb-2">
                                <input type="password" class="form-control custom-input" id="password" name="password"
                                    placeholder="Password" required>
                            </div>
                            <div class="col-md-12">
                                <input type="password" class="form-control custom-input" id="password_confirmation"
                                    name="password_confirmation" placeholder="Konfirmasi Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer custom-modal-footer">
                        <button type="submit" class="btn btn-primary custom-btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary custom-btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit & Delete Modals for each Admin -->
    @foreach ($admins as $admin)
        <!-- Edit Admin Modal -->
        <div class="modal fade" id="editAdminModal{{ $admin->id }}" tabindex="-1"
            aria-labelledby="editAdminModalLabel{{ $admin->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="editAdminModalLabel{{ $admin->id }}">Edit Pengguna</h5>
                    </div>
                    <form action="{{ route('admin.admin.update', $admin->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body custom-modal-body">
                            <div class="row g-3">
                                <div class="col-md-12 mb-2">
                                    <input type="text" class="form-control custom-input" id="edit_name{{ $admin->id }}"
                                        name="name" value="{{ $admin->name }}" placeholder="Nama Admin" required>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <select class="form-select custom-input" id="edit_role{{ $admin->id }}"
                                        name="role" required>
                                        <option value="admin" {{ $admin->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="pakar" {{ $admin->role === 'pakar' ? 'selected' : '' }}>Pakar</option>
                                        <option value="user" {{ $admin->role === 'user' ? 'selected' : '' }}>User</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <input type="email" class="form-control custom-input"
                                        id="edit_email{{ $admin->id }}" name="email" value="{{ $admin->email }}"
                                        placeholder="Email" required>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <input type="password" class="form-control custom-input"
                                        id="edit_password{{ $admin->id }}" name="password"
                                        placeholder="Password (kosongkan jika tidak diubah)">
                                </div>
                                <div class="col-md-12">
                                    <input type="password" class="form-control custom-input"
                                        id="edit_password_confirmation{{ $admin->id }}" name="password_confirmation"
                                        placeholder="Konfirmasi Password">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer custom-modal-footer">
                            <button type="submit" class="btn btn-primary custom-btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary custom-btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Admin Modal -->
        <div class="modal fade" id="deleteAdminModal{{ $admin->id }}" tabindex="-1"
            aria-labelledby="deleteAdminModalLabel{{ $admin->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="deleteAdminModalLabel{{ $admin->id }}">Konfirmasi Hapus
                        </h5>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <p>Apakah Anda yakin ingin menghapus {{ $admin->role }} <strong>{{ $admin->name }}</strong> dengan
                            email <strong>{{ $admin->email }}</strong>?</p>
                    </div>
                    <div class="modal-footer custom-modal-footer">
                        <form action="{{ route('admin.admin.destroy', $admin->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        <button type="button" class="btn btn-secondary custom-btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('styles')
    <style>
        .main-content {
            margin-left: 250px;
            padding: 3rem;
        }

        .background-white {
            background-color: #ffffff;
        }

        .card-body {
            background-color: #E1E2ED;
        }

        /* Custom Modal Styles */
        .custom-modal {
            border-radius: 10px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .custom-modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
            border-radius: 10px 10px 0 0;
            padding: 20px 25px 15px 25px;
            position: relative;
        }

        .custom-modal-header .modal-title {
            color: #333;
            font-size: 18px;
            margin: 0;
        }

        .custom-modal-body {
            padding: 25px;
            background-color: #fff;
        }

        .custom-input {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 14px;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .custom-input:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            background-color: #fff;
        }

        .custom-modal-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
            border-radius: 0 0 10px 10px;
            padding: 15px 25px 20px 25px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .custom-btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            padding: 8px 25px;
            border-radius: 6px;
            font-weight: 500;
            min-width: 80px;
        }

        .custom-btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .custom-btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: white;
            border-radius: 6px;
            font-weight: 500;
            min-width: 80px;
        }

        .custom-btn-secondary:hover {
            background-color: #545b62;
            border-color: #545b62;
            color: white;
        }
    </style>
@endpush