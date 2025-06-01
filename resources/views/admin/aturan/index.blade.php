@extends('layouts.admin')

@section('title', 'Data Aturan ISPA')

@section('page-title', 'Aturan ISPA')

@section('content')
    <div class="main-content">
        <div class="container background-white p-5 rounded-4 shadow-sm">
            <h1 class="mb-4 fw-bold">Daftar Aturan ISPA</h1>

            <!-- Table -->
            <a href="#" class="btn btn-outline-success mb-3 rounded-pill" data-bs-toggle="modal"
                data-bs-target="#addAturanModal">
                <i class="bi bi-plus-circle"></i> Tambah Aturan
            </a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-header">
                            <th style="width: 50px;">#</th>
                            <th style="width: 150px;">GEJALA SEKARANG</th>
                            <th style="width: 150px;">JAWABAN</th>
                            <th style="width: 150px;">GEJALA SELANJUTNYA</th>
                            <th style="width: 150px;">HASIL PENYAKIT</th>
                            <th style="width: 100px;">AWAL</th>
                            <th style="width: 100px">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aturans as $aturan)
                            <tr>
                                <td class="text-left">{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $aturan->gejalaSekarang ? $aturan->gejalaSekarang->gejala : '-' }}
                                </td>
                                <td class="text-left">{{ $aturan->jawaban }}</td>
                                <td class="text-left">
                                    {{ $aturan->gejalaSelanjutnya ? $aturan->gejalaSelanjutnya->gejala : '-' }}</td>
                                <td class="text-left">{{ $aturan->penyakitHasil ? $aturan->penyakitHasil->penyakit : '-' }}
                                </td>
                                <td class="text-center">
                                    @if ($aturan->is_pertanyaan_awal)
                                        <span class="badge bg-success">Ya</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak</span>
                                    @endif
                                </td>
                                <td class="text-left">
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-warning" title="Edit" data-bs-toggle="modal"
                                            data-bs-target="#editAturanModal{{ $aturan->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus" data-bs-toggle="modal"
                                            data-bs-target="#deleteAturanModal{{ $aturan->id }}">
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

    <!-- Add Aturan Modal -->
    <div class="modal fade" id="addAturanModal" tabindex="-1" aria-labelledby="addAturanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content custom-modal">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title fw-bold" id="addAturanModalLabel">Tambah Aturan ISPA</h5>
                </div>
                <form action="{{ route('admin.aturan.store') }}" method="POST">
                    @csrf
                    <div class="modal-body custom-modal-body">
                        <div class="mb-4">

                            <!-- Hasil Penyakit for when there are no branches -->
                            <div class="mb-4" id="common-disease-result">
                                <label for="id_penyakit_hasil" class="form-label">Hasil Penyakit</label>
                                <select id="id_penyakit_hasil" name="id_penyakit_hasil" class="form-select">
                                    <option value="">Pilih Penyakit</option>
                                    @foreach ($penyakits as $penyakit)
                                        <option value="{{ $penyakit->kode_penyakit }}">{{ $penyakit->penyakit }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Pilih penyakit jika merupakan hasil akhir dari
                                    percabangan</small>
                            </div>

                            <!-- Decision branches container -->
                            <div id="branches-container">
                                <!-- Initial branch group -->
                                <div class="branch-group mb-4 p-3 border rounded">
                                    <h6 class="mb-3 fw-bold">Percabangan 1</h6>

                                    <div class="mb-3">
                                        <label class="form-label">Gejala Sekarang</label>
                                        <select name="branches[0][id_gejala_sekarang]" class="form-select gejala-sekarang"
                                            required>
                                            <option value="">Pilih Gejala</option>
                                            @foreach ($gejalas as $gejala)
                                                <option value="{{ $gejala->kode_gejala }}">{{ $gejala->gejala }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Jawaban</label>
                                        <select name="branches[0][jawaban]" class="form-select" required>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Gejala Selanjutnya</label>
                                        <select name="branches[0][id_gejala_selanjutnya]" class="form-select">
                                            <option value="">Pilih Gejala</option>
                                            @foreach ($gejalas as $gejala)
                                                <option value="{{ $gejala->kode_gejala }}">{{ $gejala->gejala }}</option>
                                            @endforeach
                                        </select>
                                        <small class="form-text text-muted">Biarkan kosong jika merupakan hasil
                                            akhir</small>
                                    </div>

                                    <!-- Disease result for branch -->
                                    <div class="mb-3 branch-disease-result">
                                        <label class="form-label">Hasil Penyakit</label>
                                        <select name="branches[0][id_penyakit_hasil]" class="form-select">
                                            <option value="">Pilih Penyakit</option>
                                            @foreach ($penyakits as $penyakit)
                                                <option value="{{ $penyakit->kode_penyakit }}">{{ $penyakit->penyakit }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="form-text text-muted">Pilih jika merupakan hasil akhir dari
                                            percabangan</small>
                                    </div>

                                    <button type="button" class="btn btn-sm btn-outline-danger remove-branch"
                                        style="display:none;">
                                        <i class="bi bi-trash"></i> Hapus Percabangan
                                    </button>
                                </div>
                            </div>

                            <button type="button" id="add-branch" class="btn btn-outline-primary">
                                <i class="bi bi-plus-circle"></i> Tambah Percabangan
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer custom-modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit & Delete Modals for each Aturan -->
    @foreach ($aturans as $aturan)
        <!-- Edit Aturan Modal -->
        <div class="modal fade" id="editAturanModal{{ $aturan->id }}" tabindex="-1"
            aria-labelledby="editAturanModalLabel{{ $aturan->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="editAturanModalLabel{{ $aturan->id }}">Edit Aturan ISPA
                        </h5>
                    </div>
                    <form action="{{ route('admin.aturan.update', $aturan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body custom-modal-body">
                            <div class="mb-4">

                                <div class="mb-3">
                                    <label for="id_gejala_sekarang_{{ $aturan->id }}" class="form-label">Gejala
                                        Sekarang</label>
                                    <select id="id_gejala_sekarang_{{ $aturan->id }}" name="id_gejala_sekarang"
                                        class="form-select" required>
                                        <option value="">Pilih Gejala</option>
                                        @foreach ($gejalas as $gejala)
                                            <option value="{{ $gejala->kode_gejala }}"
                                                {{ $aturan->id_gejala_sekarang == $gejala->kode_gejala ? 'selected' : '' }}>
                                                {{ $gejala->gejala }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="jawaban_{{ $aturan->id }}" class="form-label">Jawaban</label>
                                    <select id="jawaban_{{ $aturan->id }}" name="jawaban" class="form-select"
                                        required>
                                        @if ($aturan->jawaban == 'Ya')
                                            <option value="Ya" selected>Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        @else
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak" selected>Tidak</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="id_gejala_selanjutnya_{{ $aturan->id }}" class="form-label">Gejala
                                        Selanjutnya</label>
                                    <select id="id_gejala_selanjutnya_{{ $aturan->id }}" name="id_gejala_selanjutnya"
                                        class="form-select">
                                        <option value="">Pilih Gejala</option>
                                        @foreach ($gejalas as $gejala)
                                            <option value="{{ $gejala->kode_gejala }}"
                                                {{ $aturan->id_gejala_selanjutnya == $gejala->kode_gejala ? 'selected' : '' }}>
                                                {{ $gejala->gejala }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Biarkan kosong jika merupakan hasil akhir</small>
                                </div>

                                <div class="mb-3">
                                    <label for="id_penyakit_hasil_{{ $aturan->id }}" class="form-label">Hasil
                                        Penyakit</label>
                                    <select id="id_penyakit_hasil_{{ $aturan->id }}" name="id_penyakit_hasil"
                                        class="form-select">
                                        <option value="">Pilih Penyakit</option>
                                        @foreach ($penyakits as $penyakit)
                                            <option value="{{ $penyakit->kode_penyakit }}"
                                                {{ $aturan->id_penyakit_hasil == $penyakit->kode_penyakit ? 'selected' : '' }}>
                                                {{ $penyakit->penyakit }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Biarkan kosong jika bukan hasil akhir</small>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer custom-modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Aturan Modal -->
        <div class="modal fade" id="deleteAturanModal{{ $aturan->id }}" tabindex="-1"
            aria-labelledby="deleteAturanModalLabel{{ $aturan->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title fw-bold" id="deleteAturanModalLabel{{ $aturan->id }}">Konfirmasi Hapus
                        </h5>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <p>Apakah Anda yakin ingin menghapus aturan ini?</p>
                        <p><strong>Gejala Sekarang:</strong>
                            {{ $aturan->gejalaSekarang ? $aturan->gejalaSekarang->gejala : '-' }}</p>
                        <p><strong>Jawaban:</strong> {{ $aturan->jawaban }}</p>
                        <p><strong>Gejala Selanjutnya:</strong>
                            {{ $aturan->gejalaSelanjutnya ? $aturan->gejalaSelanjutnya->gejala : '-' }}</p>
                    </div>
                    <div class="modal-footer custom-modal-footer">
                        <form action="{{ route('admin.aturan.destroy', $aturan->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Counter for branch groups
            let branchCounter = 1;

            // Function to update disease result visibility
            function updateDiseaseResultVisibility() {
                // Hide the common disease result selection when there are branches
                const commonDiseaseResult = document.getElementById('common-disease-result');
                if (commonDiseaseResult) {
                    commonDiseaseResult.style.display = document.querySelectorAll('.branch-group').length > 0 ?
                        'none' : 'block';
                }

                // Show disease result only in the last branch
                document.querySelectorAll('.branch-disease-result').forEach(container => {
                    container.style.display = 'none';
                });

                const branches = document.querySelectorAll('.branch-group');
                if (branches.length > 0) {
                    const lastBranch = branches[branches.length - 1];
                    lastBranch.querySelector('.branch-disease-result').style.display = 'block';
                }
            }

            // Add branch button functionality
            document.getElementById('add-branch').addEventListener('click', function() {
                const branchesContainer = document.getElementById('branches-container');
                const newBranch = document.createElement('div');
                newBranch.className = 'branch-group mb-4 p-3 border rounded';

                newBranch.innerHTML = `
                    <h6 class="mb-3 fw-bold">Percabangan ${branchCounter + 1}</h6>
                    
                    <div class="mb-3">
                        <label class="form-label">Gejala Sekarang</label>
                        <select name="branches[${branchCounter}][id_gejala_sekarang]" class="form-select gejala-sekarang" required>
                            <option value="">Pilih Gejala</option>
                            @foreach ($gejalas as $gejala)
                                <option value="{{ $gejala->kode_gejala }}">{{ $gejala->gejala }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jawaban</label>
                        <select name="branches[${branchCounter}][jawaban]" class="form-select" required>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gejala Selanjutnya</label>
                        <select name="branches[${branchCounter}][id_gejala_selanjutnya]" class="form-select">
                            <option value="">Pilih Gejala</option>
                            @foreach ($gejalas as $gejala)
                                <option value="{{ $gejala->kode_gejala }}">{{ $gejala->gejala }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Biarkan kosong jika merupakan hasil akhir</small>
                    </div>
                    
                    <div class="mb-3 branch-disease-result" style="display: none;">
                        <label class="form-label">Hasil Penyakit</label>
                        <select name="branches[${branchCounter}][id_penyakit_hasil]" class="form-select">
                            <option value="">Pilih Penyakit</option>
                            @foreach ($penyakits as $penyakit)
                                <option value="{{ $penyakit->kode_penyakit }}">{{ $penyakit->penyakit }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Pilih jika merupakan hasil akhir dari percabangan</small>
                    </div>
                    
                    <button type="button" class="btn btn-sm btn-outline-danger remove-branch">
                        <i class="bi bi-trash"></i> Hapus Percabangan
                    </button>
                `;

                branchesContainer.appendChild(newBranch);
                branchCounter++;

                // Make "Remove" buttons visible after adding more than one branch
                document.querySelectorAll('.remove-branch').forEach(btn => {
                    btn.style.display = 'inline-block';
                });

                // Update which branch shows the disease result field
                updateDiseaseResultVisibility();
            });

            // Remove branch button functionality (using event delegation)
            document.getElementById('branches-container').addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-branch') || event.target.parentElement.classList
                    .contains('remove-branch')) {
                    const button = event.target.classList.contains('remove-branch') ?
                        event.target : event.target.parentElement;
                    button.closest('.branch-group').remove();

                    // Hide the remove button on the only remaining branch
                    if (document.querySelectorAll('.branch-group').length === 1) {
                        document.querySelector('.remove-branch').style.display = 'none';
                    }

                    // Renumber branches for visual clarity
                    document.querySelectorAll('.branch-group h6').forEach((header, index) => {
                        header.textContent = `Percabangan ${index + 1}`;
                    });

                    // Update which branch shows the disease result field
                    updateDiseaseResultVisibility();
                }
            });

            // Initialize on page load
            updateDiseaseResultVisibility();
        });
    </script>
@endpush
