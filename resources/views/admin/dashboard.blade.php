@extends('layouts.admin')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
    <div class="main-content">
        <h1 class="mb-4">Dashboard</h1>

        <!-- Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-icon me-3">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-0">a</h5>
                            <p class="card-text text-muted">Gejala</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="card-icon me-3">
                            <i class="fas fa-virus"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-0">a</h5>
                            <p class="card-text text-muted">Penyakit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <h5 class="mb-0">Daftar Gejala</h5>
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
                    <tr>
                        <td class="text-left">#</td>
                        <td class="text-left">#</td>
                        <td class="text-left">#</td>
                    </tr>
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
    </style>
@endpush
