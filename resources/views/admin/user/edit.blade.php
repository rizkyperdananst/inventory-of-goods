@extends('layouts.dashboard')
@section('title', 'Admin | Edit User')
    
@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        @error('error')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h4>Edit User</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" id="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" value="{{ Auth::user()->email }}" id="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="passwordOld" class="form-label">Password Lama</label>
                            <input type="password" name="passwordOld" id="passwordOld" class="form-control @error('passwordOld') is-invalid @enderror" placeholder="masukkan password lama">
                            @error('passwordOld')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="masukkan password baru">
                            @error('password')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-end ms-3">Store</button>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary float-end">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection