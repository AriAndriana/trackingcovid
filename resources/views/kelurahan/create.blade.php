@extends('layouts.master.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action=" {{ route('kelurahan.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="">Masukkan Nama Kelurahan</label>
                                <input type="text" class="form-control" name="nama_kelurahan" required>
                            </div>
                            <div class="form-group">
                                <label for="">Kecamatan</label>
                                <select class="form-control"  name="id_kecamatan" id="">
                                    @foreach ($kecamatan as $item)
                                        <option value=" {{$item->id}} "> {{$item->nama_kecamatan}} </option>
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