@extends('layouts.pakar')

@section('title', 'Data Aturan ISPA')
@section('page-title', 'Kelola Aturan Pohon Keputusan')

@push('styles')
<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .action-buttons .btn {
        margin-right: 5px;
    }
    .badge-ya {
        background-color: #28a745;
        color: white;
    }
    .badge-tidak {
        background-color: #dc3545;
        color: white;
    }
    .form-section {
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #eee;
    }
    .form-section:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
    .main-content {
        margin-left: 250px;
        padding: 2rem;
    }
    .background-white {
        background-color: #ffffff;
    }
    .custom-modal .modal-content {
        border-radius: 10px;
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }
    .custom-modal-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 1rem 1.5rem;
    }
    .custom-modal-header .modal-title {
        color: #333;
        font-size: 1.15rem;
        font-weight: 600;
    }
    .custom-modal-body {
        padding: 1.5rem;
        background-color: #fff;
    }
    .custom-modal-footer {
        background-color: #f8f9fa;
        border-top: 1px solid #e9ecef;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        padding: 1rem 1.5rem;
        display: flex;
        justify-content: flex-end;
        gap: 0.5rem;
    }
    .custom-input, .form-select {
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        padding: 0.5rem 0.75rem;
        font-size: 0.9rem;
    }
    .custom-input:focus, .form-select:focus {
        border-color: #6C63FF;
        box-shadow: 0 0 0 0.2rem rgba(108, 99, 255, 0.25);
    }
</style>
@endpush

@section('content')
<div class="main-content">
    <div class="container-fluid background-white p-4 p-md-5 rounded-4 shadow-sm">
        <h1 class="mb-4 fw-bold">Daftar Aturan Diagnosa ISPA</h1>

        <a href="#" class="btn btn-success mb-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#addAturanModal">
            <i class="fas fa-plus-circle me-1"></i> Tambah Aturan Baru
        </a>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Gejala Sekarang (Kode - Pertanyaan)</th>
                        <th>Jika Jawaban</th>
                        <th>Gejala Selanjutnya (Kode - Pertanyaan)</th>
                        <th>Penyakit Hasil (Kode - Nama)</th>
                        <th class="text-center">Awal?</th>
                        <th style="width: 12%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aturans as $aturan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $aturan->id_gejala_sekarang }} <br>
                            <small class="text-muted">({{ $aturan->gejalaSekarangRel ? $aturan->gejalaSekarangRel->gejala : 'N/A' }})</small>
                        </td>
                        <td>
                            @if($aturan->jawaban == 'YA')
                                <span class="badge badge-ya p-2">{{ $aturan->jawaban }}</span>
                            @elseif($aturan->jawaban == 'TIDAK')
                                <span class="badge badge-tidak p-2">{{ $aturan->jawaban }}</span>
                            @else
                                {{ $aturan->jawaban }}
                            @endif
                        </td>
                        <td>
                            @if($aturan->id_gejala_selanjutnya)
                                {{ $aturan->id_gejala_selanjutnya }} <br>
                                <small class="text-muted">({{ $aturan->gejalaSelanjutnyaRel ? $aturan->gejalaSelanjutnyaRel->gejala : 'N/A' }})</small>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($aturan->id_penyakit_hasil)
                                {{ $aturan->id_penyakit_hasil }} <br>
                                <small class="text-muted">({{ $aturan->penyakitHasilRel ? $aturan->penyakitHasilRel->penyakit : 'N/A' }})</small>
                            @else
                                -
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($aturan->is_pertanyaan_awal)
                                <span class="badge bg-success">Ya</span>
                            @else
                                <span class="badge bg-secondary">Tidak</span>
                            @endif
                        </td>
                        <td class="action-buttons">
                            <button class="btn btn-sm btn-warning" title="Edit" data-bs-toggle="modal" data-bs-target="#editAturanModal{{ $aturan->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteAturanModal{{ $aturan->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada data aturan. Silakan tambahkan aturan baru.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
        </div>
    </div>
</div>

<div class="modal fade" id="addAturanModal" tabindex="-1" aria-labelledby="addAturanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content custom-modal">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title fw-bold" id="addAturanModalLabel">Tambah Aturan ISPA Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.aturan.store') }}" method="POST">
                @csrf
                <div class="modal-body custom-modal-body">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_pertanyaan_awal_checkbox_add" name="is_pertanyaan_awal_checkbox" value="1" {{ old('is_pertanyaan_awal_checkbox') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_pertanyaan_awal_checkbox_add">Apakah ini Pertanyaan Awal (Akar Pohon)?</label>
                    </div>

                    <div id="parent-rule-selection-add" class="mb-3" style="{{ old('is_pertanyaan_awal_checkbox') ? 'display:none;' : 'display:block;' }}">
                        <div class="mb-3">
                            <label for="id_gejala_induk_kontekstual_add" class="form-label">Merupakan Anak dari Gejala Induk (Pilih Gejala Kontekstual yang Sudah Ada):</label>
                            <select id="id_gejala_induk_kontekstual_add" name="id_gejala_induk_kontekstual" class="form-select">
                                <option value="">Pilih Gejala Induk Jika Bukan Pertanyaan Awal</option>
                                @foreach ($gejalaIndukPotensial as $gejala_induk)
                                    <option value="{{ $gejala_induk->kode_gejala }}" {{ old('id_gejala_induk_kontekstual') == $gejala_induk->kode_gejala ? 'selected' : '' }}>
                                        {{ $gejala_induk->kode_gejala }} - {{ $gejala_induk->gejala }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Pilih dari gejala yang sudah terdaftar di aturan dan tidak mengarah ke penyakit.</small>
                        </div>
                        <div class="mb-3">
                            <label for="jawaban_induk_add" class="form-label">Dengan Jawaban dari Gejala Induk:</label>
                            <select id="jawaban_induk_add" name="jawaban_induk" class="form-select">
                                <option value="YA" {{ old('jawaban_induk') == 'YA' ? 'selected' : '' }}>YA</option>
                                <option value="TIDAK" {{ old('jawaban_induk') == 'TIDAK' ? 'selected' : '' }}>TIDAK</option>
                            </select>
                        </div>
                    </div>
                    <hr/>
                    <h6 class="fw-bold">Definisi Aturan Saat Ini:</h6>
                    <div class="mb-3">
                        <label for="id_gejala_dasar_sekarang_add" class="form-label">Gejala untuk Aturan Ini (Pilih dari Gejala Dasar): <span class="text-danger">*</span></label>
                        <select id="id_gejala_dasar_sekarang_add" name="id_gejala_dasar_sekarang" class="form-select" required>
                            <option value="" disabled selected>Pilih Gejala Dasar</option>
                            @foreach ($gejalaDasar as $gejala_dasar)
                                <option value="{{ $gejala_dasar->kode_gejala }}" {{ old('id_gejala_dasar_sekarang') == $gejala_dasar->kode_gejala ? 'selected' : '' }}>
                                    {{ $gejala_dasar->gejala }} ({{ $gejala_dasar->kode_gejala }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jawaban_sekarang_add" class="form-label">Jika Gejala Ini Dijawab: <span class="text-danger">*</span></label>
                        <select id="jawaban_sekarang_add" name="jawaban_sekarang" class="form-select" required>
                            <option value="YA" {{ old('jawaban_sekarang') == 'YA' ? 'selected' : '' }}>YA</option>
                            <option value="TIDAK" {{ old('jawaban_sekarang') == 'TIDAK' ? 'selected' : '' }}>TIDAK</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Maka Tindakan Selanjutnya: <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input tindakan-selanjutnya-radio-add" type="radio" name="tindakan_selanjutnya" id="lanjut_gejala_add" value="gejala" {{ old('tindakan_selanjutnya', 'gejala') == 'gejala' ? 'checked' : '' }}>
                            <label class="form-check-label" for="lanjut_gejala_add">Lanjut ke Gejala Lain</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input tindakan-selanjutnya-radio-add" type="radio" name="tindakan_selanjutnya" id="hasil_penyakit_add" value="penyakit" {{ old('tindakan_selanjutnya') == 'penyakit' ? 'checked' : '' }}>
                            <label class="form-check-label" for="hasil_penyakit_add">Hasil Diagnosa Penyakit</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input tindakan-selanjutnya-radio-add" type="radio" name="tindakan_selanjutnya" id="akhir_jalur_add" value="akhir" {{ old('tindakan_selanjutnya') == 'akhir' ? 'checked' : '' }}>
                            <label class="form-check-label" for="akhir_jalur_add">Akhiri Jalur (Tanpa Kesimpulan)</label>
                        </div>
                    </div>
                    <div id="lanjut-gejala-container-add" class="mb-3">
                        <label for="id_gejala_dasar_selanjutnya_add" class="form-label">Gejala Selanjutnya (Pilih dari Gejala Dasar):</label>
                        <select id="id_gejala_dasar_selanjutnya_add" name="id_gejala_dasar_selanjutnya" class="form-select">
                            <option value="">Pilih Gejala Dasar</option>
                            @foreach ($gejalaDasar as $gejala_dasar)
                                <option value="{{ $gejala_dasar->kode_gejala }}" {{ old('id_gejala_dasar_selanjutnya') == $gejala_dasar->kode_gejala ? 'selected' : '' }}>
                                    {{ $gejala_dasar->gejala }} ({{ $gejala_dasar->kode_gejala }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div id="hasil-penyakit-container-add" class="mb-3" style="display:none;">
                        <label for="id_penyakit_hasil_form_add" class="form-label">Hasil Penyakit:</label>
                        <select id="id_penyakit_hasil_form_add" name="id_penyakit_hasil_form" class="form-select">
                            <option value="">Pilih Penyakit</option>
                            @foreach ($penyakits as $penyakit)
                                <option value="{{ $penyakit->kode_penyakit }}" {{ old('id_penyakit_hasil_form') == $penyakit->kode_penyakit ? 'selected' : '' }}>
                                    {{ $penyakit->penyakit }} ({{ $penyakit->kode_penyakit }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer custom-modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Aturan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($aturans as $aturan)
<div class="modal fade" id="editAturanModal{{ $aturan->id }}" tabindex="-1" aria-labelledby="editAturanModalLabel{{ $aturan->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content custom-modal">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title fw-bold" id="editAturanModalLabel{{ $aturan->id }}">Edit Aturan ISPA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.aturan.update', $aturan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body custom-modal-body">
                    <p><strong>Mengedit Aturan Untuk:</strong></p>
                    <p>
                        Gejala Sekarang (Kode Kontekstual): <strong>{{ $aturan->id_gejala_sekarang }}</strong>
                        ({{ $aturan->gejalaSekarangRel ? $aturan->gejalaSekarangRel->gejala : 'N/A' }})
                    </p>
                    <p>Jika Dijawab: <strong>{{ $aturan->jawaban }}</strong></p>
                    <hr/>
                    <h6 class="fw-bold">Ubah Tindakan Selanjutnya:</h6>
                    @php
                        $tipeTindakanEdit = 'akhir';
                        if (!empty($aturan->id_gejala_selanjutnya)) {
                            $tipeTindakanEdit = 'gejala';
                        } elseif (!empty($aturan->id_penyakit_hasil)) {
                            $tipeTindakanEdit = 'penyakit';
                        }
                    @endphp
                    <div class="mb-3">
                        <label class="form-label">Pilih Tindakan Baru:</label>
                        <div class="form-check">
                            <input class="form-check-input tindakan-edit-radio" data-target-id="{{ $aturan->id }}" type="radio" name="tindakan_selanjutnya_edit" id="lanjut_gejala_edit_{{ $aturan->id }}" value="gejala" {{ old('tindakan_selanjutnya_edit', $tipeTindakanEdit) == 'gejala' ? 'checked' : '' }}>
                            <label class="form-check-label" for="lanjut_gejala_edit_{{ $aturan->id }}">Lanjut ke Gejala Lain</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input tindakan-edit-radio" data-target-id="{{ $aturan->id }}" type="radio" name="tindakan_selanjutnya_edit" id="hasil_penyakit_edit_{{ $aturan->id }}" value="penyakit" {{ old('tindakan_selanjutnya_edit', $tipeTindakanEdit) == 'penyakit' ? 'checked' : '' }}>
                            <label class="form-check-label" for="hasil_penyakit_edit_{{ $aturan->id }}">Hasil Diagnosa Penyakit</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input tindakan-edit-radio" data-target-id="{{ $aturan->id }}" type="radio" name="tindakan_selanjutnya_edit" id="akhir_jalur_edit_{{ $aturan->id }}" value="akhir" {{ old('tindakan_selanjutnya_edit', $tipeTindakanEdit) == 'akhir' ? 'checked' : '' }}>
                            <label class="form-check-label" for="akhir_jalur_edit_{{ $aturan->id }}">Akhiri Jalur</label>
                        </div>
                    </div>

                    <div id="lanjut-gejala-container-edit-{{ $aturan->id }}" class="mb-3">
                        <label for="id_gejala_dasar_selanjutnya_edit_{{ $aturan->id }}" class="form-label">Gejala Selanjutnya (Pilih dari Gejala Dasar):</label>
                        <select id="id_gejala_dasar_selanjutnya_edit_{{ $aturan->id }}" name="id_gejala_dasar_selanjutnya_edit" class="form-select">
                            <option value="">Pilih Gejala Dasar</option>
                            @php $kodeDasarSelanjutnya = $aturan->id_gejala_selanjutnya ? explode('_fr_', $aturan->id_gejala_selanjutnya)[0] : ''; @endphp
                            @foreach ($gejalaDasar as $gejala_dasar)
                                <option value="{{ $gejala_dasar->kode_gejala }}" {{ old('id_gejala_dasar_selanjutnya_edit', $kodeDasarSelanjutnya) == $gejala_dasar->kode_gejala ? 'selected' : '' }}>
                                    {{ $gejala_dasar->gejala }} ({{ $gejala_dasar->kode_gejala }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div id="hasil-penyakit-container-edit-{{ $aturan->id }}" class="mb-3">
                        <label for="id_penyakit_hasil_form_edit_{{ $aturan->id }}" class="form-label">Hasil Penyakit:</label>
                        <select id="id_penyakit_hasil_form_edit_{{ $aturan->id }}" name="id_penyakit_hasil_form_edit" class="form-select">
                            <option value="">Pilih Penyakit</option>
                            @foreach ($penyakits as $penyakit)
                                <option value="{{ $penyakit->kode_penyakit }}" {{ old('id_penyakit_hasil_form_edit', $aturan->id_penyakit_hasil) == $penyakit->kode_penyakit ? 'selected' : '' }}>
                                    {{ $penyakit->penyakit }} ({{ $penyakit->kode_penyakit }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer custom-modal-footer">
                    <button type="submit" class="btn btn-primary">Update Aturan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteAturanModal{{ $aturan->id }}" tabindex="-1" aria-labelledby="deleteAturanModalLabel{{ $aturan->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title fw-bold" id="deleteAturanModalLabel{{ $aturan->id }}">Konfirmasi Hapus Aturan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom-modal-body">
                <p>Apakah Anda yakin ingin menghapus aturan ini?</p>
                <p><strong>Gejala Sekarang:</strong> {{ $aturan->id_gejala_sekarang }} ({{ $aturan->gejalaSekarangRel ? $aturan->gejalaSekarangRel->gejala : '-' }})</p>
                <p><strong>Jawaban:</strong> {{ $aturan->jawaban }}</p>
            </div>
            <div class="modal-footer custom-modal-footer">
                <form action="{{ route('admin.aturan.destroy', $aturan->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const isPertanyaanAwalCheckboxAdd = document.getElementById('is_pertanyaan_awal_checkbox_add');
    const parentRuleSelectionDivAdd = document.getElementById('parent-rule-selection-add');
    const tindakanRadioButtonsAdd = document.querySelectorAll('input[name="tindakan_selanjutnya"]');
    const lanjutGejalaContainerAdd = document.getElementById('lanjut-gejala-container-add');
    const hasilPenyakitContainerAdd = document.getElementById('hasil-penyakit-container-add');
    const selectGejalaSelanjutnyaAdd = document.getElementById('id_gejala_dasar_selanjutnya_add');
    const selectPenyakitHasilAdd = document.getElementById('id_penyakit_hasil_form_add');

    function toggleParentRuleSelectionAdd() {
        if (isPertanyaanAwalCheckboxAdd.checked) {
            parentRuleSelectionDivAdd.style.display = 'none';
            document.getElementById('id_gejala_induk_kontekstual_add').required = false;
            document.getElementById('jawaban_induk_add').required = false;
        } else {
            parentRuleSelectionDivAdd.style.display = 'block';
            document.getElementById('id_gejala_induk_kontekstual_add').required = true;
            document.getElementById('jawaban_induk_add').required = true;
        }
    }

    function toggleTindakanSelanjutnyaAdd() {
        let selectedValue = '';
        tindakanRadioButtonsAdd.forEach(radio => {
            if (radio.checked) {
                selectedValue = radio.value;
            }
        });

        if (selectedValue === 'gejala') {
            lanjutGejalaContainerAdd.style.display = 'block';
            hasilPenyakitContainerAdd.style.display = 'none';
            selectGejalaSelanjutnyaAdd.required = true;
            selectPenyakitHasilAdd.required = false;
            selectPenyakitHasilAdd.value = '';
        } else if (selectedValue === 'penyakit') {
            lanjutGejalaContainerAdd.style.display = 'none';
            hasilPenyakitContainerAdd.style.display = 'block';
            selectGejalaSelanjutnyaAdd.required = false;
            selectGejalaSelanjutnyaAdd.value = '';
            selectPenyakitHasilAdd.required = true;
        } else {
            lanjutGejalaContainerAdd.style.display = 'none';
            hasilPenyakitContainerAdd.style.display = 'none';
            selectGejalaSelanjutnyaAdd.required = false;
            selectGejalaSelanjutnyaAdd.value = '';
            selectPenyakitHasilAdd.required = false;
            selectPenyakitHasilAdd.value = '';
        }
    }

    if(isPertanyaanAwalCheckboxAdd) {
        isPertanyaanAwalCheckboxAdd.addEventListener('change', toggleParentRuleSelectionAdd);
        toggleParentRuleSelectionAdd();
    }

    tindakanRadioButtonsAdd.forEach(radio => {
        radio.addEventListener('change', toggleTindakanSelanjutnyaAdd);
    });
    toggleTindakanSelanjutnyaAdd();

    document.querySelectorAll('.modal.fade[id^="editAturanModal"]').forEach(modal => {
        const aturanId = modal.id.replace('editAturanModal', '');
        const tindakanEditRadioButtons = modal.querySelectorAll('.tindakan-edit-radio[data-target-id="' + aturanId + '"]');
        const lanjutGejalaContainerEdit = modal.querySelector('#lanjut-gejala-container-edit-' + aturanId);
        const hasilPenyakitContainerEdit = modal.querySelector('#hasil-penyakit-container-edit-' + aturanId);
        const selectGejalaSelanjutnyaEdit = modal.querySelector('#id_gejala_dasar_selanjutnya_edit_' + aturanId);
        const selectPenyakitHasilEdit = modal.querySelector('#id_penyakit_hasil_form_edit_' + aturanId);

        function toggleTindakanSelanjutnyaEdit() {
            let selectedValueEdit = '';
            tindakanEditRadioButtons.forEach(radio => {
                if (radio.checked) {
                    selectedValueEdit = radio.value;
                }
            });

            if (lanjutGejalaContainerEdit && hasilPenyakitContainerEdit && selectGejalaSelanjutnyaEdit && selectPenyakitHasilEdit) {
                if (selectedValueEdit === 'gejala') {
                    lanjutGejalaContainerEdit.style.display = 'block';
                    hasilPenyakitContainerEdit.style.display = 'none';
                    selectGejalaSelanjutnyaEdit.required = true;
                    selectPenyakitHasilEdit.required = false;
                    if (selectPenyakitHasilEdit) selectPenyakitHasilEdit.value = '';
                } else if (selectedValueEdit === 'penyakit') {
                    lanjutGejalaContainerEdit.style.display = 'none';
                    hasilPenyakitContainerEdit.style.display = 'block';
                    selectGejalaSelanjutnyaEdit.required = false;
                    if (selectGejalaSelanjutnyaEdit) selectGejalaSelanjutnyaEdit.value = '';
                    selectPenyakitHasilEdit.required = true;
                } else {
                    lanjutGejalaContainerEdit.style.display = 'none';
                    hasilPenyakitContainerEdit.style.display = 'none';
                    selectGejalaSelanjutnyaEdit.required = false;
                    if (selectGejalaSelanjutnyaEdit) selectGejalaSelanjutnyaEdit.value = '';
                    selectPenyakitHasilEdit.required = false;
                    if (selectPenyakitHasilEdit) selectPenyakitHasilEdit.value = '';
                }
            }
        }

        tindakanEditRadioButtons.forEach(radio => {
            radio.addEventListener('change', toggleTindakanSelanjutnyaEdit);
        });
        toggleTindakanSelanjutnyaEdit();
    });
});
</script>
@endpush