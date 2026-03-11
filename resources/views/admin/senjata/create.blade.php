@extends('admin.layouts.mainAdmin')

@section('title', 'Tambah Senjata')

@section('content')

    <div class="container-fluid">

        <div class="card shadow mb-4">

            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Senjata</h6>
            </div>

            <div class="card-body">

                <form action="{{ route('senjata.store') }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <label>Nama Senjata</label>
                        <input type="text" name="nama_senjata" class="form-control">
                        @error('nama_senjata')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Jenis</label>
                        <input type="text" name="jenis" class="form-control">
                        @error('jenis')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kaliber</label>
                        <input type="text" name="kaliber" class="form-control">
                        @error('kaliber')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Negara Asal</label>
                        <input type="text" name="negara_asal" class="form-control">
                        @error('negara_asal')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tahun Produksi</label>
                        <input type="number" name="tahun_produksi" class="form-control">
                        @error('tahun_produksi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-success">Simpan</button>
                    <a href="{{ route('senjata.index') }}" class="btn btn-secondary">Kembali</a>

                </form>

            </div>
        </div>

    </div>

@endsection
