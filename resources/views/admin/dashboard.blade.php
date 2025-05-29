@extends('layouts.admin')

@section('title', 'Sistem Pakar Diagnosa Penyakit ISPA')

@section('page-title', 'Dashboard')

@section('content')
    <div class="main-content">
        <div class="container background-white p-5 rounded-4 shadow-sm">
            <h1 class="mb-4 fw-bold">Dashboard</h1>

            <!-- Cards -->
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="card-icon me-3">
                                <i class="fa fa-stethoscope text-primary fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-0">{{ $gejalaCount }}</h5>
                                <p class="card-text">Gejala</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="card-icon me-3">
                                <i class="fa fa-virus text-danger fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-0">a</h5>
                                <p class="card-text">Penyakit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <h5 class="mb-3 fs-3">Daftar Gejala</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-header">
                            <th style="width: 50px;">#</th>
                            <th style="width: 100px;">KODE</th>
                            <th>GEJALA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gejalas as $gejala)
                            <tr>
                                <td class="text-left">{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $gejala->kode_gejala }}</td>
                                <td class="text-left">{{ $gejala->gejala }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
    </style>
@endpush
