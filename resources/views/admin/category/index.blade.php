@extends('layouts.dashboard')
@section('title', 'Admin | Index Category')
    
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
                <h4>Index Category</h4>
                <a href="{{ route('category.create') }}" class="btn btn-primary"><i class="fa-regular fa-plus me-2"></i>Create</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategory</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($categories as $c)
                            <tr>
                                <td width="5%"">{{ $no++ }}</td>
                                <td>{{ $c->nama_kategori }}</td>
                                <td width="8%">
                                    <a href="{{ route('category.edit', $c->id) }}" class="btn btn-warning">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('category.destroy', $c->id) }}" method="POST" class="d-inline">
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