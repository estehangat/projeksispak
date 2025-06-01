@extends('layouts.pakar')

@section('title', 'Data Gejala')

@section('page-title', 'Gejala')

@section('content')
    <div class="main-content">
        <div class="container background-white p-5 rounded-4 shadow-sm">
            <h1 class="mb-4 fw-bold">Daftar Gejala</h1>

            <!-- Table -->
            <a href="#" class="btn btn-outline-success mb-3 rounded-pill" data-bs-toggle="modal"
                data-bs-target="#addGejalaModal">
                <i class="bi bi-plus-circle"></i> Tambah Gejala
            </a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-header">
                            <th style="width: 50px;">#</th>
                            <th style="width: 100px;">KODE GEJALA</th>
                            <th style="width: 300px;">GEJALA</th>
                            <th style="width: 100px">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gejalas as $gejala)
                            <tr>
                                <td class="text-left">{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $gejala->kode_gejala }}</td>
                                <td class="text-left">{{ $gejala->gejala }}</td>
                                <td class="text-left">
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-warning" title="Edit" data-bs-toggle="modal"
                                            data-bs-target="#editGejalaModal{{ $gejala->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus" data-bs-toggle="modal"
                                            data-bs-target="#deleteGejalaModal{{ $gejala->id }}">
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

    <!-- Add Gejala Modal -->
    <div class="modal fade" id="addGejalaModal" tabindex="-1" aria-labelledby="addGejalaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content custom-modal">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title fw-bold" id="addGejalaModalLabel">Tambah Gejala</h5>
                </div>
                <form action="{{ route('pakar.gejala.store') }}" method="POST">
                    @csrf
                    <div class="modal-body custom-modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control custom-input" id="kode_gejala"
                                    name="kode_gejala" placeholder="Kode Gejala" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control custom-input" id="gejala" name="gejala"
                                    placeholder="Gejala" required>
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

    <!-- Edit & Delete Modals for each Gejala -->
    @foreach ($gejalas as $gejala)
        <!-- Edit Gejala Modal -->
        <div class="modal fade" id="editGejalaModal{{ $gejala->id }}" tabindex="-1"
            aria-labelledby="editGejalaModalLabel{{ $gejala->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="editGejalaModalLabel{{ $gejala->id }}">Edit Gejala</h5>
                    </div>
                    <form action="{{ route('pakar.gejala.update', $gejala->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body custom-modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom-input"
                                        id="edit_kode_gejala{{ $gejala->id }}" name="kode_gejala"
                                        value="{{ $gejala->kode_gejala }}" placeholder="Kode Gejala" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom-input"
                                        id="edit_gejala{{ $gejala->id }}" name="gejala"
                                        value="{{ $gejala->gejala }}" placeholder="Gejala" required>
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

        <!-- Delete Gejala Modal -->
        <div class="modal fade" id="deleteGejalaModal{{ $gejala->id }}" tabindex="-1"
            aria-labelledby="deleteGejalaModalLabel{{ $gejala->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="deleteGejalaModalLabel{{ $gejala->id }}">Konfirmasi Hapus
                        </h5>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <p>Apakah Anda yakin ingin menghapus gejala <strong>{{ $gejala->gejala }}</strong> dengan
                            kode <strong>{{ $gejala->kode_gejala }}</strong>?</p>
                    </div>
                    <div class="modal-footer custom-modal-footer">
                        <form action="{{ route('pakar.gejala.destroy', $gejala->id) }}" method="POST"
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

        .selected-input {
            border-color: #007bff !important;
            background-color: #fff !important;
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

        /* Modal backdrop */
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.6);
        }
    </style>
@endpush