@extends('layouts.main')
@section('title', 'Data Customer')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            {{ $message }}
        </div>
    @endif
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
                        <th class="col-5">Nama</th>
                        <th class="col-3">No. Telepon</th>
                        <th class="col-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($customers as $customer)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->tlpn }}</td>
                            <td>
                                <form method="POST" action="{{ route('customers.delete', [$customer->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-warning" href="{{ route('customers.edit', [$customer->id]) }}">
                                        <i class="fa fa-pencil-alt"></i>Edit
                                    </a>
                                    |
                                    <button class="btn btn-danger" href="{{ route('customers.delete', [$customer->id]) }}"
                                        type="submit"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data customer ini?')">
                                        <i class="fa fa-trash"></i>Delete
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
            {{ $customers->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </div>

@endsection
