@extends('layouts.master.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action=" {{ route('provinsi.update', $provinsi->id) }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <input type="hidden" name="" id="">
                            <div class="form-group">
                                <label for="">Masukkan Nama Provinsi</label>
                                <input type="text" class="form-control" name="nama_provinsi" value="{{ $provinsi->nama_provinsi }}" required>
                            </div>
                        <div class="form-group">
                            <button class="btn btn-primary"  type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection