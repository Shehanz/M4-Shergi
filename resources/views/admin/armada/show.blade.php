@extends('admin.layouts.mainAdmin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <i class="fas fa-info-circle"></i> Detail Armada
    </h1>
    <div>
        <a href="{{ route('admin.armada.edit', $id) }}" class="btn btn-warning btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="{{ route('admin.armada.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="card shadow mb-4" id="detailCard">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informasi Lengkap Armada</h6>
    </div>
    <div class="card-body text-center">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@vite(['resources/js/armada.js'])
<script>
    const API_URL = '/api/armada-pesawat-tempur';
    const armadaId = {{ $id }};

    function loadDetail() {
        $.get(`${API_URL}/${armadaId}`, function(response) {
            const data = response.data;
            let statusColor = data.status === 'Aktif' ? 'success' : (data.status === 'Perbaikan' ? 'warning' : 'info');

            let html = `
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr><th width="35%">Kode Armada</th><td><code>${data.kode_armada}</code></td></tr>
                        <tr><th>Nama Pesawat</th><td><strong>${data.nama_pesawat}</strong></td></tr>
                        <tr><th>Tipe</th><td>${data.tipe}</td></tr>
                        <tr><th>Tahun Produksi</th><td>${data.tahun_produksi}</td></tr>
                        <tr><th>Negara Pembuat</th><td>${data.negara_pembuat}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr><th width="35%">Jumlah Unit</th><td><span class="badge badge-secondary">${data.jumlah_unit}</span></td></tr>
                    <tr><th>Status</th><td><span class="badge badge-${statusColor}">${data.status}</span></td></tr>
                    <tr><th>Dibuat Pada</th><td>${new Date(data.created_at).toLocaleString()}</td></tr>
                    <tr><th>Terakhir Update</th><td>${new Date(data.updated_at).toLocaleString()}</td></tr>
                </table>
            </div>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header bg-light"><strong>Deskripsi</strong></div>
                    <div class="card-body">${data.deskripsi || 'Tidak ada deskripsi.'}</div>
                </div>
            </div>
        </div>`;
            $('#detailCard .card-body').html(html);
        }).fail(function() {
            $('#detailCard .card-body').html('<div class="alert alert-danger">Gagal memuat data</div>');
        });
    }

    $(document).ready(function() {
        loadDetail();
    });
</script>
@endpush
