@extends('layouts.dashboard')
@section('title', 'Admin | Create Category')
    
@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h4>Create Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="nama_kategori" class="form-label">Nama Kategory</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="masukkan nama kategori">
                            @error('nama_kategori')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-end ms-3">Store</button>
                            <a href="{{ route('category.index') }}" class="btn btn-secondary float-end">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection