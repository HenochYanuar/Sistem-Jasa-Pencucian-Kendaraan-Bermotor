@extends('layouts.main')
@section('title', 'Edit Data Customer')
@section('content')
    @if ($message = Session::get('errors'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-cross"></i> Failed!</h5>
            {{ $message }}
        </div>
    @endif
    <form method="POST" action="{{ route('customers.update') }}">
        <div class="row">
            <div class="card col-8 ml-5">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $customer->id }}">
                    <div class="form-group">
                        <label for="">Customer Name</label>
                        <input value="{{ $customer->name }}" class="form-control" type="text" name="name" />
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input value="{{ $customer->tlpn }}" class="form-control" type="text" name="tlpn" />
                    </div>

                    <button class="btn btn-success mt-2" type="submit">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
