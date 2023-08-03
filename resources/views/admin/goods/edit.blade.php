@extends('layouts.dashboard')
@section('title', 'Admin | Edit Goods')
    
@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h4>Edit Goods</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('goods.update', $g->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="category_id" class="form-label">Nama Kategori</label>
                            <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                <option selected hidden>Pilih Kategori</option>
                                @foreach ($categories as $c)
                                    @if ($g->category_id == $c->id)
                                        <option value="{{ $c->id }}" selected>{{ $c->nama_kategori }}</option>
                                    @else
                                        <option value="{{ $c->id }}">{{ $c->nama_kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" value="{{ $g->nama_barang }}" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="masukkan nama barang">
                            @error('nama_barang')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" name="harga" value="{{ $g->harga }}" id="harga" class="form-control uang @error('harga') is-invalid @enderror" placeholder="masukkan harga barang">
                            @error('harga')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" value="{{ $g->stok }}" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="masukkan stok barang">
                            @error('stok')
                                <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-end ms-3">Update</button>
                            <a href="{{ route('goods.index') }}" class="btn btn-secondary float-end">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        var harga = document.getElementById('harga');
        harga.addEventListener('keyup', function(e)
        {
            harga.value = formatRupiah(this.value, 'Rp. ');
        });
        
        function formatRupiah(angka, prefix)
        {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split    = number_string.split(','),
                sisa     = split[0].length % 3,
                rupiah     = split[0].substr(0, sisa),
                ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
        </script>
@endpush
@endsection