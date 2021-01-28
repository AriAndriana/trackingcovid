@extends('layouts.master.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action=" {{ route('provinsi.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Masukkan Nama Provinsi</label>
                            <input type="text" class="form-control" name="nama_provinsi" >
                            {!! $errors->first('nama_provinsi','<p class="help-block" style="color:red">:message</p>') !!}
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
<script src=" {{asset('js/main.js')}} "></script>
@endsection