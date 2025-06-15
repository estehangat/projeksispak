@extends('layouts.admin')

@section('title', 'Data Artikel')

@section('page-title', 'Artikel')

@section('content')
    <div class="main-content">
        <div class="container background-white p-5 rounded-4 shadow-sm">
            <h1 class="mb-4 fw-bold">Daftar Artikel Kesehatan</h1>

            <!-- Table -->
            <a href="#" class="btn btn-outline-success mb-3 rounded-pill" data-bs-toggle="modal"
                data-bs-target="#addArtikelModal">
                <i class="bi bi-plus-circle"></i> Tambah Artikel
            </a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-header">
                            <th style="width: 50px;">#</th>
                            <th style="width: 250px;">JUDUL</th>
                            <th style="width: 200px;">RINGKASAN</th>
                            <th style="width: 150px;">URL EKSTERNAL</th>
                            <th style="width: 120px;">PENULIS</th>
                            <th style="width: 150px;">SUMBER PUBLIKASI</th>
                            <th style="width: 100px;">STATUS</th>
                            <th style="width: 100px;">TANGGAL</th>
                            <th style="width: 100px">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artikels as $artikel)
                            <tr>
                                <td class="text-left">{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $artikel->judul }}</td>
                                <td class="text-left">{{ \Illuminate\Support\Str::limit($artikel->ringkasan, 80) }}</td>
                                <td class="text-left">
                                    @if($artikel->url_eksternal)
                                        <a href="{{ $artikel->url_eksternal }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-globe"></i> Visit
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-left">{{ $artikel->penulis }}</td>
                                <td class="text-left">{{ $artikel->sumber_publikasi }}</td>
                                <td class="text-left">
                                    <span class="badge {{ $artikel->status == 'published' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $artikel->status }}
                                    </span>
                                </td>
                                <td class="text-left">{{ $artikel->published_at ? $artikel->published_at->format('d/m/Y') : '-' }}</td>
                                <td class="text-left">
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-warning" title="Edit" data-bs-toggle="modal"
                                            data-bs-target="#editArtikelModal{{ $artikel->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus" data-bs-toggle="modal"
                                            data-bs-target="#deleteArtikelModal{{ $artikel->id }}">
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

    <!-- Add Artikel Modal -->
    <div class="modal fade" id="addArtikelModal" tabindex="-1" aria-labelledby="addArtikelModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content custom-modal">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title fw-bold" id="addArtikelModalLabel">Tambah Artikel</h5>
                </div>
                <form action="{{ route('admin.artikel.store') }}" method="POST">
                    @csrf
                    <div class="modal-body custom-modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <input type="text" class="form-control custom-input" id="judul"
                                    name="judul" placeholder="Judul Artikel" required>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control custom-input" id="ringkasan" name="ringkasan"
                                    placeholder="Ringkasan Artikel" rows="3" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <input type="url" class="form-control custom-input" id="url_eksternal"
                                    name="url_eksternal" placeholder="URL Artikel" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control custom-input" id="penulis"
                                    name="penulis" placeholder="Penulis" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control custom-input" id="sumber_publikasi"
                                    name="sumber_publikasi" placeholder="Sumber Publikasi" required>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select custom-input" id="status" name="status" required>
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option value="draft">Draft</option>
                                    <option value="published">Published</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control custom-input" id="published_at"
                                    name="published_at" placeholder="Tanggal Publikasi">
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

    <!-- Edit & Delete Modals for each Artikel -->
    @foreach ($artikels as $artikel)
        <!-- Edit Artikel Modal -->
        <div class="modal fade" id="editArtikelModal{{ $artikel->id }}" tabindex="-1"
            aria-labelledby="editArtikelModalLabel{{ $artikel->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="editArtikelModalLabel{{ $artikel->id }}">Edit Artikel</h5>
                    </div>
                    <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body custom-modal-body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <input type="text" class="form-control custom-input" id="edit_judul{{ $artikel->id }}"
                                        name="judul" value="{{ $artikel->judul }}" placeholder="Judul Artikel" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control custom-input" id="edit_ringkasan{{ $artikel->id }}" 
                                        name="ringkasan" placeholder="Ringkasan Artikel" rows="3" required>{{ $artikel->ringkasan }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <input type="url" class="form-control custom-input" id="edit_url_eksternal{{ $artikel->id }}"
                                        name="url_eksternal" value="{{ $artikel->url_eksternal }}" placeholder="URL Artikel" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom-input" id="edit_penulis{{ $artikel->id }}"
                                        name="penulis" value="{{ $artikel->penulis }}" placeholder="Penulis" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom-input" id="edit_sumber_publikasi{{ $artikel->id }}"
                                        name="sumber_publikasi" value="{{ $artikel->sumber_publikasi }}" placeholder="Sumber Publikasi" required>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select custom-input" id="edit_status{{ $artikel->id }}" name="status" required>
                                        <option value="draft" {{ $artikel->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ $artikel->status == 'published' ? 'selected' : '' }}>Published</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control custom-input" id="edit_published_at{{ $artikel->id }}"
                                        name="published_at" value="{{ $artikel->published_at ? $artikel->published_at->format('Y-m-d') : '' }}">
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

        <!-- Delete Artikel Modal -->
        <div class="modal fade" id="deleteArtikelModal{{ $artikel->id }}" tabindex="-1"
            aria-labelledby="deleteArtikelModalLabel{{ $artikel->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="deleteArtikelModalLabel{{ $artikel->id }}">Konfirmasi Hapus</h5>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <p>Apakah Anda yakin ingin menghapus artikel <strong>{{ $artikel->judul }}</strong>?</p>
                    </div>
                    <div class="modal-footer custom-modal-footer">
                        <form action="{{ route('admin.artikel.destroy', $artikel->id) }}" method="POST"
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