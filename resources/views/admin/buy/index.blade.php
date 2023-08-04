@extends('layouts.dashboard')
@section('title', 'Admin | Index Buy')
    
@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between">
                <h4>Index Buy</h4>
                <a href="{{ route('buy.create') }}" class="btn btn-primary"><i class="fa-regular fa-plus me-2"></i>Create</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Supplier</th>
                                <th>Barang</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($buys as $b)
                            <tr>
                                <td width="5%"">{{ $no++ }}</td>
                                <td>{{ $b->suppliers->nama_supplier }}</td>
                                <td>{{ $b->goods->nama_barang }}</td>
                                <td>{{ $b->tanggal }}</td>
                                <td>{{ $b->jumlah }}</td>
                                <td width="8%">
                                    <a href="{{ route('buy.edit', $b->id) }}" class="btn btn-warning">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <form action="#" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <p>Data Kosong</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection