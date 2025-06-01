@extends('layouts.admin')

@section('title', 'Data Feedback')

@section('page-title', 'Feedback')

@section('content')
    <div class="main-content">
        <div class="container background-white p-5 rounded-4 shadow-sm">
            <h1 class="mb-4 fw-bold">Daftar Feedback</h1>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-header">
                            <th style="width: 50px;">#</th>
                            <th style="width: 125px;">NAMA</th>
                            <th style="width: 150px;">EMAIL</th>
                            <th style="width: 100px;">RATING</th>
                            <th>KOMENTAR</th>
                            <th style="width: 200px;">DIAGNOSA PENYAKIT</th>
                            <th style="width: 150px;">SESI DIAGNOSA</th>
                            <th style="width: 75px;">TANGGAL</th>
                            <th style="width: 80px">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                            <tr>
                                <td class="text-left">{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $feedback->nama }}</td>
                                <td class="text-left">{{ $feedback->email }}</td>
                                <td class="text-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $feedback->rating)
                                            <i class="bi bi-star-fill text-warning"></i>
                                        @else
                                            <i class="bi bi-star text-warning"></i>
                                        @endif
                                    @endfor
                                </td>
                                <td class="text-left">{{ $feedback->komentar }}</td>
                                <td class="text-left">{{ $feedback->diagnosa_penyakit }}</td>
                                <td class="text-left">{{ $feedback->sesi_diagnosa }}</td>
                                <td class="text-left">{{ $feedback->created_at->format('d/m/Y') }}</td>
                                <td class="text-left">
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-info" title="Detail" data-bs-toggle="modal"
                                            data-bs-target="#detailFeedbackModal{{ $feedback->id }}">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus" data-bs-toggle="modal"
                                            data-bs-target="#deleteFeedbackModal{{ $feedback->id }}">
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

    <!-- Detail & Delete Modals for each Feedback -->
    @foreach ($feedbacks as $feedback)
        <!-- Detail Feedback Modal -->
        <div class="modal fade" id="detailFeedbackModal{{ $feedback->id }}" tabindex="-1"
            aria-labelledby="detailFeedbackModalLabel{{ $feedback->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="detailFeedbackModalLabel{{ $feedback->id }}">Detail Feedback</h5>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p class="mb-1 fw-bold">Nama:</p>
                                <p>{{ $feedback->nama }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-bold">Email:</p>
                                <p>{{ $feedback->email }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p class="mb-1 fw-bold">Rating:</p>
                                <p>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $feedback->rating)
                                            <i class="bi bi-star-fill text-warning"></i>
                                        @else
                                            <i class="bi bi-star text-warning"></i>
                                        @endif
                                    @endfor
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-bold">Diagnosa Penyakit:</p>
                                <p>{{ $feedback->diagnosa_penyakit }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <p class="mb-1 fw-bold">Komentar:</p>
                                <p>{{ $feedback->komentar }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="mb-1 fw-bold">Sesi Diagnosa:</p>
                                @if(is_array($feedback->sesi_diagnosa))
                                    <ul class="list-group">
                                        @foreach($feedback->sesi_diagnosa as $key => $value)
                                            <li class="list-group-item">
                                                <strong>{{ $key }}</strong>: {{ is_array($value) ? json_encode($value) : $value }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Tidak ada data sesi</p>
                                @endif
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

        <!-- Delete Feedback Modal -->
        <div class="modal fade" id="deleteFeedbackModal{{ $feedback->id }}" tabindex="-1"
            aria-labelledby="deleteFeedbackModalLabel{{ $feedback->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="deleteFeedbackModalLabel{{ $feedback->id }}">Konfirmasi Hapus
                        </h5>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <p>Apakah Anda yakin ingin menghapus feedback dari <strong>{{ $feedback->nama }}</strong>?</p>
                    </div>
                    <div class="modal-footer custom-modal-footer">
                        <form action="{{ route('admin.feedback.destroy', $feedback->id) }}" method="POST"
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