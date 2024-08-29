@extends('layouts.main')
@section('title', 'Tambah Data')
@section('content')
@if ($message = Session::get('errors'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-cross"></i> Failed!</h5>
        {{ $message }}
    </div>
@endif
<form method="POST" action="{{ route('customers.addNewPost') }}">
  <div class="row">
      <div class="card col-8 ml-5">
          <div class="card-body">
              @csrf
              <div class="form-group">
                  <label for="">Customer Name</label>
                  <input value="{{ old('name') }}" class="form-control"
                      type="text" name="name" />
              </div>
              <div class="form-group">
                  <label for="">Phone Number</label>
                  <input value="{{ old('tlpn') }}" class="form-control"
                      type="text" name="tlpn" />
              </div>
              {{-- @include('layouts/vehicleDataForm') --}}
              <div class="form-group">
                <label for="">Vehicle Brand</label>
                <input value="{{ old('brand') }}" class="form-control"
                    type="text" name="brand" />
              </div>
              <div class="form-group">
                <label for="">Vehicle Model</label>
                <input value="{{ old('model') }}" class="form-control"
                    type="text" name="model" />
              </div>
              <div class="form-group">
                <label for="">Vehicle Number Plate</label>
                <input value="{{ old('vehicle_number_plate') }}" class="form-control"
                    type="text" name="vehicle_number_plate" />
              </div>
              <div class="form-group">
              <label for="vehicleSelect">Select Vehicle Type</label>
              <select value="{{ old('price') }}" id="price" class="form-control"
                    type="text" name="price">
                  <option value="" disabled selected>Select</option>
                  <option value="15000">Motor dibawah 250cc - Rp 15.000</option>
                  <option value="30000">Motor diatas 250cc - Rp 30.000</option>
                  <option value="70000">Mobil pribadi - Rp 70.000</option>
                  <option value="150000">Minibus - Rp 150.000</option>
              </select>
            </div>

              <button class="btn btn-success mt-2" type="submit">
                  <i class="fa fa-save"></i> Save
              </button>
          </div>
      </div>
  </div>
</form>
@endsection