@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<div class="container my-4">
  <div class="row">
      <!-- Card 1 -->
      <div class="col-md-6">
          <div class="card">
              <div class="card-body">
                  <h3 class="">Add a transaction with existing customer</h3>
                  <p class="card-text">Click the button below to add a new transaction with the old customer data.</p>
                  <a href="{{ route('customers.addExist') }}" class="btn btn-primary">Add Transaction</a>
              </div>
          </div>
      </div>
      <!-- Card 2 -->
      <div class="col-md-6">
          <div class="card">
              <div class="card-body">
                  <h3 class="">Add a transaction with new customer</h3>
                  <p class="card-text">Click the button below to add a new transaction with the new customer data.</p>
                  <a href="{{ route('customers.addNew') }}" class="btn btn-primary">Add Transaction</a>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection