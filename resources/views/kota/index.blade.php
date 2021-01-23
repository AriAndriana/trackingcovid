@extends('layouts.master.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Kota
                        <a href=" {{route('kota.create')}} " class="btn btn-primary" style="float: right;">Tambah Data</a>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kota</th>
                                    <th>Kode Kota</th>
                                    <th>Provinsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td> {{$item->nama_kota}} </td>
                                        <td> {{$item->kode_kota}} </td>
                                        <td> {{$item->provinsi->nama_provinsi}} </td>
                                        <td>
                                            <center>
                                                <form action="{{ route('kota.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('Delete')
                                                    <a class="btn btn-success" href=" {{route('kota.edit', $item->id)}} ">
                                                        Edit
                                                    </a> |
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection