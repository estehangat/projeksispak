@extends('layouts.admin')

@section('title', 'Data Fasilitas Kesehatan')

@section('page-title', 'Fasilitas Kesehatan')

@section('content')
    <div class="main-content">
        <div class="container background-white p-5 rounded-4 shadow-sm">
            <h1 class="mb-4 fw-bold">Daftar Fasilitas Kesehatan</h1>

            <!-- Table -->
            <a href="#" class="btn btn-outline-success mb-3 rounded-pill" data-bs-toggle="modal"
                data-bs-target="#addFaskesModal">
                <i class="bi bi-plus-circle"></i> Tambah Fasilitas Kesehatan
            </a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-header">
                            <th style="width: 50px;">#</th>
                            <th style="width: 250px;">NAMA FASILITAS</th>
                            <th style="width: 200px;">ALAMAT</th>
                            <th style="width: 150px;">NO TELEPON</th>
                            <th style="width: 150px;">PROVINSI</th>
                            <th style="width: 150px;">KABUPATEN</th>
                            <th style="width: 100px">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rumahSakits as $rs)
                            <tr>
                                <td class="text-left">{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $rs->nama_rs }}</td>
                                <td class="text-left">{{ $rs->alamat }}</td>
                                <td class="text-left">{{ $rs->no_telp }}</td>
                                <td class="text-left">{{ $rs->kabupaten->provinsi->nama_provinsi ?? '-' }}</td>
                                <td class="text-left">{{ $rs->kabupaten->nama_kabupaten ?? '-' }}</td>
                                <td class="text-left">
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-warning" title="Edit" data-bs-toggle="modal"
                                            data-bs-target="#editFaskesModal{{ $rs->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus" data-bs-toggle="modal"
                                            data-bs-target="#deleteFaskesModal{{ $rs->id }}">
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

    <!-- Add Faskes Modal -->
    <div class="modal fade" id="addFaskesModal" tabindex="-1" aria-labelledby="addFaskesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content custom-modal">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title fw-bold" id="addFaskesModalLabel">Tambah Fasilitas Kesehatan</h5>
                </div>
                <form action="{{ route('admin.faskes.store') }}" method="POST">
                    @csrf
                    <div class="modal-body custom-modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nama_rs" class="form-label">Nama Fasilitas Kesehatan</label>
                                <input type="text" class="form-control custom-input" id="nama_rs" name="nama_rs"
                                    placeholder="Nama Fasilitas Kesehatan" required>
                            </div>
                            <div class="col-md-6">
                                <label for="no_telp" class="form-label">No Telepon</label>
                                <input type="text" class="form-control custom-input" id="no_telp" name="no_telp"
                                    placeholder="No Telepon" required>
                            </div>
                            <div class="col-md-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control custom-input" id="alamat" name="alamat" placeholder="Alamat Lengkap" rows="3"
                                    required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="provinsi_id" class="form-label">Provinsi</label>
                                <select class="form-select custom-input provinsi-select" id="provinsi_id" name="provinsi_id" required>
                                    <option value="" selected disabled>Pilih Provinsi</option>
                                    @foreach ($provinsis as $provinsi)
                                        <option value="{{ $provinsi->id }}">{{ $provinsi->nama_provinsi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="kabupaten_id" class="form-label">Kabupaten/Kota</label>
                                <select class="form-select custom-input kabupaten-select" id="kabupaten_id" name="kabupaten_id" required>
                                    <option value="" selected disabled>Pilih Kabupaten/Kota</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="website_url" class="form-label">Website URL</label>
                                <input type="url" class="form-control custom-input" id="website_url" name="website_url"
                                    placeholder="Website URL (opsional)">
                            </div>
                            <div class="col-md-6">
                                <label for="deskripsi_tambahan" class="form-label">Deskripsi Tambahan</label>
                                <textarea class="form-control custom-input" id="deskripsi_tambahan" name="deskripsi_tambahan"
                                    placeholder="Deskripsi tambahan (opsional)" rows="3"></textarea>
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

    <!-- Edit & Delete Modals for each Faskes -->
    @foreach ($rumahSakits as $rs)
        <!-- Edit Faskes Modal -->
        <div class="modal fade" id="editFaskesModal{{ $rs->id }}" tabindex="-1"
            aria-labelledby="editFaskesModalLabel{{ $rs->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="editFaskesModalLabel{{ $rs->id }}">Edit Fasilitas
                            Kesehatan</h5>
                    </div>
                    <form action="{{ route('admin.faskes.update', $rs->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body custom-modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="edit_nama_rs{{ $rs->id }}" class="form-label">Nama Fasilitas
                                        Kesehatan</label>
                                    <input type="text" class="form-control custom-input"
                                        id="edit_nama_rs{{ $rs->id }}" name="nama_rs" value="{{ $rs->nama_rs }}"
                                        placeholder="Nama Fasilitas Kesehatan" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="edit_no_telp{{ $rs->id }}" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control custom-input"
                                        id="edit_no_telp{{ $rs->id }}" name="no_telp" value="{{ $rs->no_telp }}"
                                        placeholder="No Telepon" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="edit_alamat{{ $rs->id }}" class="form-label">Alamat</label>
                                    <textarea class="form-control custom-input" id="edit_alamat{{ $rs->id }}" name="alamat"
                                        placeholder="Alamat Lengkap" rows="3" required>{{ $rs->alamat }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="edit_provinsi_id{{ $rs->id }}" class="form-label">Provinsi</label>
                                    <select class="form-select custom-input provinsi-select" 
                                            id="edit_provinsi_id{{ $rs->id }}" 
                                            name="provinsi_id" 
                                            data-faskes-id="{{ $rs->id }}" 
                                            required>
                                        <option value="" disabled>Pilih Provinsi</option>
                                        @foreach ($provinsis as $provinsi)
                                            <option value="{{ $provinsi->id }}"
                                                {{ $rs->kabupaten && $rs->kabupaten->provinsi_id == $provinsi->id ? 'selected' : '' }}>
                                                {{ $provinsi->nama_provinsi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="edit_kabupaten_id{{ $rs->id }}"
                                        class="form-label">Kabupaten/Kota</label>
                                    <select class="form-select custom-input kabupaten-select" 
                                            id="edit_kabupaten_id{{ $rs->id }}" 
                                            name="kabupaten_id" 
                                            required>
                                        <option value="" disabled>Pilih Kabupaten/Kota</option>
                                        @foreach ($kabupatens->where('provinsi_id', $rs->kabupaten->provinsi_id ?? 0) as $kabupaten)
                                            <option value="{{ $kabupaten->id }}"
                                                {{ $rs->kabupaten_id == $kabupaten->id ? 'selected' : '' }}>
                                                {{ $kabupaten->nama_kabupaten }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="edit_website_url{{ $rs->id }}" class="form-label">Website
                                        URL</label>
                                    <input type="url" class="form-control custom-input"
                                        id="edit_website_url{{ $rs->id }}" name="website_url"
                                        value="{{ $rs->website_url }}" placeholder="Website URL (opsional)">
                                </div>
                                <div class="col-md-6">
                                    <label for="edit_deskripsi_tambahan{{ $rs->id }}" class="form-label">Deskripsi
                                        Tambahan</label>
                                    <textarea class="form-control custom-input" id="edit_deskripsi_tambahan{{ $rs->id }}"
                                        name="deskripsi_tambahan" placeholder="Deskripsi tambahan (opsional)" rows="3">{{ $rs->deskripsi_tambahan }}</textarea>
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

        <!-- Delete Faskes Modal -->
        <div class="modal fade" id="deleteFaskesModal{{ $rs->id }}" tabindex="-1"
            aria-labelledby="deleteFaskesModalLabel{{ $rs->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="deleteFaskesModalLabel{{ $rs->id }}">Konfirmasi Hapus
                        </h5>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <p>Apakah Anda yakin ingin menghapus fasilitas kesehatan <strong>{{ $rs->nama_rs }}</strong>?</p>
                    </div>
                    <div class="modal-footer custom-modal-footer">
                        <form action="{{ route('admin.faskes.destroy', $rs->id) }}" method="POST"
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

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Fungsi untuk mengambil kabupaten
        function getKabupatensByProvinsi(provinsiId, targetSelect) {
            if (provinsiId) {
                // Gunakan URL lengkap untuk menghindari masalah routing
                var fullUrl = window.location.origin + '/test-kabupatens/' + provinsiId;
                
                console.log("Fetching kabupatens from URL:", fullUrl);
                
                $.ajax({
                    url: fullUrl,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log("Success! Data received:", data);
                        
                        $(targetSelect).empty();
                        $(targetSelect).append('<option value="" selected disabled>Pilih Kabupaten/Kota</option>');
                        
                        $.each(data, function(key, value) {
                            $(targetSelect).append('<option value="' + value.id + '">' + value.nama_kabupaten + '</option>');
                        });
                        
                        $(targetSelect).prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error details:", xhr.responseText);
                        console.error("Status code:", xhr.status);
                        console.error("Error:", error);
                        alert("Gagal mengambil data kabupaten. Periksa console untuk detail error.");
                    }
                });
            } else {
                $(targetSelect).empty();
                $(targetSelect).append('<option value="" selected disabled>Pilih Kabupaten/Kota</option>');
                $(targetSelect).prop('disabled', true);
            }
        }

        // Modal tambah
        $('#provinsi_id').on('change', function() {
            var provinsiId = $(this).val();
            getKabupatensByProvinsi(provinsiId, '#kabupaten_id');
        });

        // Modal edit
        $('.provinsi-select').not('#provinsi_id').on('change', function() {
            var provinsiId = $(this).val();
            var faskesId = $(this).attr('data-faskes-id');
            getKabupatensByProvinsi(provinsiId, '#edit_kabupaten_id' + faskesId);
        });
    });
</script>
@endpush
