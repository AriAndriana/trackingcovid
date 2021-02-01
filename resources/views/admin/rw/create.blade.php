@extends('layouts.master.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Rw
                    </h6>
                </div>
                <div class="card-body">
                    <form action=" {{ route('rw.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="">Masukkan Nama Rw</label>
                                <input type="text" class="form-control" name="nama" required>
                                {!! $errors->first('nama','<p class="help-block" style="color:red">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                <label for="">Kelurahan</label>
                                <select class="form-control"  name="id_kelurahan" id="">
                                    @foreach ($kelurahan as $item)
                                        <option value=" {{$item->id}} "> {{$item->nama_kelurahan}} </option>
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