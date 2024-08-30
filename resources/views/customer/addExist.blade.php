@extends('layouts.main')
@section('title', 'Tambah Data')
@section('content')
    @if ($message = Session::get('errors'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-danger"></i> Failed!</h5>
            {{ $message }}
        </div>
    @endif
    <form method="POST" action="{{ route('customers.addExistPost') }}">
        <div class="row">
            <div class="card col-8 ml-5">
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                      <label for="customer">Select Customer</label>
                      <select value="{{ old('customer') }}" id="customer" class="form-control"
                            type="text" name="customer">
                          <option value="" disabled selected>Select</option>
                          @foreach ($customers as $customer)
                              <option value="{{ $customer->id }}">{{ $customer->name }} / {{ $customer->tlpn }}</option>
                          @endforeach
                      </select>
                    </div>
                    
                    @include('layouts/vehicleDataForm')

                <button class="btn btn-success mt-2" type="submit">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </div>
        </div>
    </form>
@endsection
