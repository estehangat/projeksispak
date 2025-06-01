@extends('layouts.admin')

@section('title', 'Data Hasil Diagnosa')

@section('page-title', 'Hasil Diagnosa')

@section('content')
    <div class="main-content">
        <div class="container background-white p-5 rounded-4 shadow-sm">
            <h1 class="mb-4 fw-bold">Daftar Hasil Diagnosa</h1>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-header">
                            <th style="width: 50px;">#</th>
                            <th style="width: 150px;">PASIEN</th>
                            <th style="width: 200px;">DIAGNOSA PENYAKIT</th>
                            <th style="width: 150px;">KODE PENYAKIT</th>
                            <th>DESKRIPSI</th>
                            <th style="width: 125px;">TANGGAL</th>
                            <th style="width: 80px">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasilDiagnosa as $hasil)
                            <tr>
                                <td class="text-left">{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $hasil->user ? $hasil->user->name : 'Pasien Anonim' }}</td>
                                <td class="text-left">{{ $hasil->penyakit->penyakit }}</td>
                                <td class="text-left">{{ $hasil->penyakit->kode_penyakit }}</td>
                                <td class="text-left">{{ Str::limit($hasil->penyakit->deskripsi, 100) }}</td>
                                <td class="text-left">{{ $hasil->created_at->format('d/m/Y') }}</td>
                                <td class="text-left">
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-info" title="Detail" data-bs-toggle="modal"
                                            data-bs-target="#detailHasilModal{{ $hasil->id }}">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus" data-bs-toggle="modal"
                                            data-bs-target="#deleteHasilModal{{ $hasil->id }}">
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

    <!-- Detail & Delete Modals for each Hasil Diagnosa -->
    @foreach ($hasilDiagnosa as $hasil)
        <!-- Detail Hasil Diagnosa Modal -->
        <div class="modal fade" id="detailHasilModal{{ $hasil->id }}" tabindex="-1"
            aria-labelledby="detailHasilModalLabel{{ $hasil->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="detailHasilModalLabel{{ $hasil->id }}">Detail Hasil Diagnosa</h5>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p class="mb-1 fw-bold">Pasien:</p>
                                <p>{{ $hasil->user ? $hasil->user->name : 'Pasien Anonim' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-bold">Tanggal Diagnosa:</p>
                                <p>{{ $hasil->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p class="mb-1 fw-bold">Penyakit:</p>
                                <p>{{ $hasil->penyakit->penyakit }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-bold">Kode Penyakit:</p>
                                <p>{{ $hasil->penyakit->kode_penyakit }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <p class="mb-1 fw-bold">Deskripsi:</p>
                                <p>{{ $hasil->penyakit->deskripsi }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="mb-1 fw-bold">Solusi/Pengobatan:</p>
                                <p>{{ $hasil->penyakit->solusi }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer custom-modal-footer">
                        <button type="button" class="btn btn-secondary custom-btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Hasil Diagnosa Modal -->
        <div class="modal fade" id="deleteHasilModal{{ $hasil->id }}" tabindex="-1"
            aria-labelledby="deleteHasilModalLabel{{ $hasil->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="deleteHasilModalLabel{{ $hasil->id }}">Konfirmasi Hapus
                        </h5>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <p>Apakah Anda yakin ingin menghapus hasil diagnosa 
                           <strong>{{ $hasil->penyakit->penyakit }}</strong> 
                           untuk pasien <strong>{{ $hasil->user ? $hasil->user->name : 'Anonim' }}</strong>?</p>
                    </div>
                    <div class="modal-footer custom-modal-footer">
                        <form action="{{ route('admin.hasil.destroy', $hasil->id) }}" method="POST"
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

        .custom-modal-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
            border-radius: 0 0 10px 10px;
            padding: 15px 25px 20px 25px;
            display: flex;
            justify-content: center;
            gap: 10px;
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