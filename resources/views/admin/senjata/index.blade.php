@extends('admin.layouts.mainAdmin')

@section('title', 'Data Senjata')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Senjata</h6>

            <a href="{{ route('senjata.create') }}" class="btn btn-primary btn-sm">
                Tambah Data
            </a>
        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Kaliber</th>
                            <th>Negara</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($data as $senjata)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $senjata->nama_senjata }}</td>
                                <td>{{ $senjata->jenis }}</td>
                                <td>{{ $senjata->kaliber }}</td>
                                <td>{{ $senjata->negara_asal }}</td>
                                <td>{{ $senjata->tahun_produksi }}</td>

                                <td>

                                    <a href="{{ route('senjata.edit', $senjata->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('senjata.destroy', $senjata->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="button" class="btn btn-danger btn-sm btn-delete">
                                            Hapus
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center">
                                    Data belum ada
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            })
        </script>
    @endif

    @push('scripts')
        <script>
            $(document).on('click', '.btn-delete', function(e) {

                e.preventDefault();

                let form = $(this).closest("form");

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: 'Data tidak bisa dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e74a3b',
                    cancelButtonColor: '#858796',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {

                    if (result.isConfirmed) {
                        form.submit();
                    }

                });

            });
        </script>
    @endpush

@endsection
