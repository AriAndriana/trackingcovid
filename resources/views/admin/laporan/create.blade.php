@extends('layouts.master.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Laporan') }}</div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('laporan.store')}}" class="form-horizontal m-t-30" method="post">
                                    @csrf
                                    
                                    @livewire('tracking-data')
                                    
                                    <div class="form-group">
                                        <button type="submit" class="float-right btn btn-info">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection