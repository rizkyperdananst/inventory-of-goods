@extends('layouts.dashboard')
@section('title', 'Admin | Edit Buy')
    
@section('content')
<div class="row mb-3">
    <div class="col-md-">
        @error('error')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                <h4>Edit Buy</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('buy.update', $b->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="supplier_id" class="form-label">Nama Supplier</label>
                            <select name="supplier_id" id="supplier_id" class="form-select @error('supplier_id') is-invalid @enderror">
                                <option selected hidden>Pilih Supplier</option>
                                @foreach ($suppliers as $s)
                                    @if ($b->supplier_id == $s->id)
                                        <option value="{{ $s->id }}" selected>{{ $s->nama_supplier }}</option>
                                    @else
                                        <option value="{{ $s->id }}">{{ $s->nama_supplier }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('supplier_id')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="goods_id" class="form-label">Nama Barang</label>
                            <select name="goods_id" id="goods_id" class="form-select @error('goods_id') is-invalid @enderror">
                                <option selected hidden>Pilih Supplier</option>
                                @foreach ($goods as $g)
                                    @if ($b->goods_id == $g->id)
                                        <option value="{{ $g->id }}" selected>{{ $g->nama_barang }}</option>
                                    @else
                                        <option value="{{ $g->id }}">{{ $g->nama_barang }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('goods_id')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" value="{{ $b->tanggal }}" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                            @error('tanggal')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" value="{{ $b->jumlah }}" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" placeholder="masukkan jumlah">
                            @error('jumlah')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-end ms-3">Update</button>
                            <a href="{{ route('buy.index') }}" class="btn btn-secondary float-end">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection