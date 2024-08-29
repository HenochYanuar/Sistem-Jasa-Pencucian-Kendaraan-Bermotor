@extends('layouts.main')
@section('title', 'Detail Transaksi')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            {{ $message }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h3 class="text_center">Detail Transaction</h3>
            <table class="table">
                <tbody>
                    <div class="form-group">
                        <tr>
                            <td class="col-6"><b>Nama</b></td>
                            <td class="col-6">: {{ $customer->name }}</td>
                        </tr>
                        <tr>
                            <td><b>No. Tepelone</b></td>
                            <td>: {{ $customer->tlpn }}</td>
                        </tr>
                        <tr>
                            <td><b>Biaya Pencucian</b></td>
                            @if ($transaction->price == "Diskon Gratis")
                              <td>: {{ $transaction->price }}</td>
                            @else
                              <td>: Rp. {{ $transaction->price }}</Rp.>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Transaksi</b></td>
                            <td>: {{ $transaction->date_transaction }}</td>
                        </tr>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
@endsection
