@extends('admin.layouts.mainAdmin')

@section('title', 'Edit Senjata')

@section('content')

    <div class="container-fluid">

        <div class="card shadow mb-4">

            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Senjata</h6>
            </div>

            <div class="card-body">

                <form action="{{ route('senjata.update', $data->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Nama Senjata</label>
                        <input type="text" name="nama_senjata" value="{{ $data->nama_senjata }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Jenis</label>
                        <input type="text" name="jenis" value="{{ $data->jenis }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Kaliber</label>
                        <input type="text" name="kaliber" value="{{ $data->kaliber }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Negara Asal</label>
                        <input type="text" name="negara_asal" value="{{ $data->negara_asal }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Tahun Produksi</label>
                        <input type="number" name="tahun_produksi" value="{{ $data->tahun_produksi }}"
                            class="form-control">
                    </div>

                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('senjata.index') }}" class="btn btn-secondary">Kembali</a>

                </form>

            </div>
        </div>

    </div>

@endsection
