@extends('layouts.main')
@section('title', 'Data Transaksi')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            {{ $message }}
        </div>
    @endif
    {{-- <a class="btn btn-primary mb-2" href="{{ route('books.create') }}">Tambah Buku</a>
    <a target="_blank" class="btn btn-danger mb-2" href="{{ route('books.print') }}?search={{ old('search') }}">Export PDF</a>
    <a target="_blank" class="btn btn-success mb-2" href="{{ route('books.export.excel') }}">Export Excel</a> --}}
    <div class="card mt-6">
        <div class="card-header">
            <div class="card-tools">
                <form action="">
                    <input value="{{ old('search') }}" placeholder="Search Book" type="text" name="search"
                        class="from-control">
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table" width='100%'>
                <thead>
                    <tr>
                        <th class="col-1">No</th>
                        <th class="col-3">Nama</th>
                        <th class="col-2">No. Telepon</th>
                        <th class="col-3">Tanggal</th>
                        <th class="col-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($transactions as $transaction)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $transaction->customer->name }}</td>
                            <td>{{ $transaction->customer->tlpn }}</td>
                            <td>{{ $transaction->date_transaction }}</td>
                            <td>
                                <form method="POST" action="{{ route('transactions.delete', [$transaction->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-info" href="{{ route('transactions.detail', [$transaction->id]) }}">
                                        <i class="fa fa-eye"></i> Detail
                                    </a>
                                    |
                                    <button class="btn btn-danger" href="{{ route('transactions.delete', [$transaction->id]) }}"
                                        type="submit"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data transaksi ini?')">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td style="text-align: center;" colspan="4"><b>Data Kosong</b></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $transactions->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </div>

@endsection
