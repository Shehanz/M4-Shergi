@extends('admin.layouts.mainAdmin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <i class="fas fa-edit"></i> Edit Armada
    </h1>
    <div>
        <a href="{{ route('admin.armada.index') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Armada</h6>
    </div>
    <div class="card-body">
        <form id="armadaForm" onsubmit="event.preventDefault(); submitEditForm({{ $id }});">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kode Armada <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="kode_armada" name="kode_armada" required>
                    <div class="invalid-feedback" id="kode_armada-error"></div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Pesawat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama_pesawat" name="nama_pesawat" required>
                    <div class="invalid-feedback" id="nama_pesawat-error"></div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Tipe <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="tipe" name="tipe" required>
                    <div class="invalid-feedback" id="tipe-error"></div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Tahun Produksi <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="tahun_produksi" name="tahun_produksi" min="1900" max="{{ date('Y') }}" required>
                    <div class="invalid-feedback" id="tahun_produksi-error"></div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Negara Pembuat <span class="text-danger">*</span></label>
                    <select class="form-control" id="negara_pembuat" name="negara_pembuat" required>
                        <option value="USA">🇺🇸 USA</option>
                        <option value="Russia">🇷🇺 Russia</option>
                        <option value="China">🇨🇳 China</option>
                        <option value="France">🇫🇷 France</option>
                        <option value="UK">🇬🇧 UK</option>
                        <option value="Germany">🇩🇪 Germany</option>
                    </select>
                    <div class="invalid-feedback" id="negara_pembuat-error"></div>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Jumlah Unit <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="jumlah_unit" name="jumlah_unit" min="1" required>
                    <div class="invalid-feedback" id="jumlah_unit-error"></div>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Perbaikan">Perbaikan</option>
                        <option value="Cadangan">Cadangan</option>
                    </select>
                    <div class="invalid-feedback" id="status-error"></div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                    <div class="invalid-feedback" id="deskripsi-error"></div>
                </div>
            </div>

            <hr>
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.armada.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
@vite(['resources/js/armada.js'])
<script>
    $(document).ready(function() {
        loadEditData({{ $id }});
    });
</script>
@endpush
