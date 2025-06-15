@extends('layouts.pakar')

@section('title', 'Data Penyakit')

@section('page-title', 'Penyakit')

@section('content')
    <div class="main-content">
        <div class="container background-white p-5 rounded-4 shadow-sm">
            <h1 class="mb-4 fw-bold">Daftar Penyakit</h1>

            <!-- Table -->
            <a href="#" class="btn btn-outline-success mb-3 rounded-pill" data-bs-toggle="modal"
                data-bs-target="#addPenyakitModal">
                <i class="bi bi-plus-circle"></i> Tambah Penyakit
            </a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-header">
                            <th style="width: 50px;">#</th>
                            <th style="width: 100px;">KODE PENYAKIT</th>
                            <th style="width: 200px;">PENYAKIT</th>
                            <th style="width: 300px;">DESKRIPSI</th>
                            <th style="width: 300px;">SOLUSI</th>
                            <th style="width: 100px">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penyakits as $penyakit)
                            <tr>
                                <td class="text-left">{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $penyakit->kode_penyakit }}</td>
                                <td class="text-left">{{ $penyakit->penyakit }}</td>
                                <td class="text-left">{{ Str::limit($penyakit->deskripsi, 100) }}</td>
                                <td class="text-left">{{ Str::limit($penyakit->solusi, 100) }}</td>
                                <td class="text-left">
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-warning" title="Edit" data-bs-toggle="modal"
                                            data-bs-target="#editPenyakitModal{{ $penyakit->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus" data-bs-toggle="modal"
                                            data-bs-target="#deletePenyakitModal{{ $penyakit->id }}">
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

    <!-- Add Penyakit Modal -->
    <div class="modal fade" id="addPenyakitModal" tabindex="-1" aria-labelledby="addPenyakitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content custom-modal">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title fw-bold" id="addPenyakitModalLabel">Tambah Penyakit</h5>
                </div>
                <form action="{{ route('pakar.penyakit.store') }}" method="POST">
                    @csrf
                    <div class="modal-body custom-modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="kode_penyakit" class="form-label">Kode Penyakit</label>
                                <input type="text" class="form-control custom-input" id="kode_penyakit"
                                    name="kode_penyakit" placeholder="Kode Penyakit" required>
                            </div>
                            <div class="col-md-6">
                                <label for="penyakit" class="form-label">Nama Penyakit</label>
                                <input type="text" class="form-control custom-input" id="penyakit" name="penyakit"
                                    placeholder="Nama Penyakit" required>
                            </div>
                            <div class="col-12">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control custom-input" id="deskripsi" name="deskripsi" rows="4"
                                    placeholder="Deskripsi penyakit..."></textarea>
                            </div>
                            <div class="col-12">
                                <label for="solusi" class="form-label">Solusi</label>
                                <textarea class="form-control custom-input" id="solusi" name="solusi" rows="4"
                                    placeholder="Solusi atau pengobatan..."></textarea>
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

    <!-- Edit & Delete Modals for each Penyakit -->
    @foreach ($penyakits as $penyakit)
        <!-- Edit Penyakit Modal -->
        <div class="modal fade" id="editPenyakitModal{{ $penyakit->id }}" tabindex="-1"
            aria-labelledby="editPenyakitModalLabel{{ $penyakit->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="editPenyakitModalLabel{{ $penyakit->id }}">Edit Penyakit</h5>
                    </div>
                    <form action="{{ route('pakar.penyakit.update', $penyakit->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body custom-modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="edit_kode_penyakit{{ $penyakit->id }}" class="form-label">Kode Penyakit</label>
                                    <input type="text" class="form-control custom-input"
                                        id="edit_kode_penyakit{{ $penyakit->id }}" name="kode_penyakit"
                                        value="{{ $penyakit->kode_penyakit }}" placeholder="Kode Penyakit" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="edit_penyakit{{ $penyakit->id }}" class="form-label">Nama Penyakit</label>
                                    <input type="text" class="form-control custom-input"
                                        id="edit_penyakit{{ $penyakit->id }}" name="penyakit"
                                        value="{{ $penyakit->penyakit }}" placeholder="Nama Penyakit" required>
                                </div>
                                <div class="col-12">
                                    <label for="edit_deskripsi{{ $penyakit->id }}" class="form-label">Deskripsi</label>
                                    <textarea class="form-control custom-input" id="edit_deskripsi{{ $penyakit->id }}" 
                                        name="deskripsi" rows="4" placeholder="Deskripsi penyakit...">{{ $penyakit->deskripsi }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label for="edit_solusi{{ $penyakit->id }}" class="form-label">Solusi</label>
                                    <textarea class="form-control custom-input" id="edit_solusi{{ $penyakit->id }}" 
                                        name="solusi" rows="4" placeholder="Solusi atau pengobatan...">{{ $penyakit->solusi }}</textarea>
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

        <!-- Delete Penyakit Modal -->
        <div class="modal fade" id="deletePenyakitModal{{ $penyakit->id }}" tabindex="-1"
            aria-labelledby="deletePenyakitModalLabel{{ $penyakit->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="deletePenyakitModalLabel{{ $penyakit->id }}">Konfirmasi Hapus
                        </h5>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <p>Apakah Anda yakin ingin menghapus penyakit <strong>{{ $penyakit->penyakit }}</strong> dengan
                            kode <strong>{{ $penyakit->kode_penyakit }}</strong>?</p>
                    </div>
                    <div class="modal-footer custom-modal-footer">
                        <form action="{{ route('pakar.penyakit.destroy', $penyakit->id) }}" method="POST"
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

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        textarea.custom-input {
            resize: vertical;
            min-height: 100px;
        }
    </style>
@endpush