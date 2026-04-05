// resources/js/armada.js
const API_URL = '/api/armada-pesawat-tempur';

// Load data armada ke tabel
window.loadArmada = function() {
    $.ajax({
        url: API_URL,
        method: 'GET',
        success: function(response) {
            let rows = '';
            if (response.data.length === 0) {
                rows = '<tr><td colspan="9" class="text-center">Belum ada data armada</td></tr>';
            } else {
                $.each(response.data, function(index, item) {
                    let statusBadge = '';
                    if (item.status === 'Aktif') statusBadge = 'badge-success';
                    else if (item.status === 'Perbaikan') statusBadge = 'badge-warning';
                    else statusBadge = 'badge-info';

                    rows += `
                    <tr>
                        <td class="text-center">${index + 1}</td>
                        <td><code>${item.kode_armada}</code></td>
                        <td><strong>${item.nama_pesawat}</strong></td>
                        <td>${item.tipe}</td>
                        <td class="text-center">${item.tahun_produksi}</td>
                        <td>${item.negara_pembuat}</td>
                        <td class="text-center"><span class="badge badge-secondary">${item.jumlah_unit}</span></td>
                        <td class="text-center"><span class="badge ${statusBadge}">${item.status}</span></td>
                        <td class="text-center">
                            <a href="/admin/armada/${item.id}" class="btn btn-info btn-sm" title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="/admin/armada/${item.id}/edit" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" title="Hapus" onclick="deleteArmada(${item.id})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>`;
                });
            }
            $('#armada-table-body').html(rows);
        },
        error: function() {
            $('#armada-table-body').html('<tr><td colspan="9" class="text-center text-danger">Gagal memuat data</td></tr>');
        }
    });
};

// Hapus armada
window.deleteArmada = function(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data armada akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `${API_URL}/${id}`,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function() {
                    Swal.fire('Terhapus!', 'Armada berhasil dihapus', 'success');
                    loadArmada();
                },
                error: function() {
                    Swal.fire('Error!', 'Gagal menghapus data', 'error');
                }
            });
        }
    });
};

// Submit form create
window.submitCreateForm = function() {
    const formData = {
        kode_armada: $('#kode_armada').val(),
        nama_pesawat: $('#nama_pesawat').val(),
        tipe: $('#tipe').val(),
        tahun_produksi: $('#tahun_produksi').val(),
        negara_pembuat: $('#negara_pembuat').val(),
        jumlah_unit: $('#jumlah_unit').val(),
        status: $('#status').val(),
        deskripsi: $('#deskripsi').val()
    };

    $.ajax({
        url: API_URL,
        method: 'POST',
        data: JSON.stringify(formData),
        contentType: 'application/json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function() {
            Swal.fire('Berhasil!', 'Armada berhasil ditambahkan', 'success')
                .then(() => { window.location.href = '/admin/armada'; });
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                $('.is-invalid').removeClass('is-invalid');
                $.each(errors, function(key, value) {
                    $(`#${key}`).addClass('is-invalid');
                    $(`#${key}-error`).text(value[0]);
                });
            } else {
                Swal.fire('Error!', 'Terjadi kesalahan', 'error');
            }
        }
    });
};

// Submit form edit
window.submitEditForm = function(id) {
    const formData = {
        kode_armada: $('#kode_armada').val(),
        nama_pesawat: $('#nama_pesawat').val(),
        tipe: $('#tipe').val(),
        tahun_produksi: $('#tahun_produksi').val(),
        negara_pembuat: $('#negara_pembuat').val(),
        jumlah_unit: $('#jumlah_unit').val(),
        status: $('#status').val(),
        deskripsi: $('#deskripsi').val()
    };

    $.ajax({
        url: `${API_URL}/${id}`,
        method: 'PUT',
        data: JSON.stringify(formData),
        contentType: 'application/json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function() {
            Swal.fire('Berhasil!', 'Armada berhasil diupdate', 'success')
                .then(() => { window.location.href = '/admin/armada'; });
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                $('.is-invalid').removeClass('is-invalid');
                $.each(errors, function(key, value) {
                    $(`#${key}`).addClass('is-invalid');
                    $(`#${key}-error`).text(value[0]);
                });
            } else {
                Swal.fire('Error!', 'Terjadi kesalahan', 'error');
            }
        }
    });
};

// Load data ke form edit
window.loadEditData = function(id) {
    $.ajax({
        url: `${API_URL}/${id}`,
        method: 'GET',
        success: function(response) {
            const data = response.data;
            $('#kode_armada').val(data.kode_armada);
            $('#nama_pesawat').val(data.nama_pesawat);
            $('#tipe').val(data.tipe);
            $('#tahun_produksi').val(data.tahun_produksi);
            $('#negara_pembuat').val(data.negara_pembuat);
            $('#jumlah_unit').val(data.jumlah_unit);
            $('#status').val(data.status);
            $('#deskripsi').val(data.deskripsi);
        }
    });
};
