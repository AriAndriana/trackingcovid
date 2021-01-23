@extends('layouts.master.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action=" {{ route('kota.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="">Masukkan Kode Kota</label>
                                <input type="number" class="form-control" name="kode_kota" required>
                            </div>
                            <div class="form-group">
                                <label for="">Masukkan Nama Kota</label>
                                <input type="text" class="form-control" name="nama_kota" required>
                            </div>
                            <div class="form-group">
                                <label for="">Provinsi</label>
                                <select class="form-control"  name="id_provinsi" id="">
                                    @foreach ($provinsi as $item)
                                        <option value=" {{$item->id}} "> {{$item->nama_provinsi}} </option>
                                    @endforeach
                                </select>
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