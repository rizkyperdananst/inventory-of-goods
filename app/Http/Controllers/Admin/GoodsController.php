<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GoodsRequest;
use App\Models\Category;
use App\Models\Goods;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        $goods = Goods::orderBy('id', 'desc')->get();

        return view('admin.goods.index', compact('goods'));
    }

    public function create()
    {
        $categories = Category::orderBy('nama_kategori', 'asc')->get();

        return view('admin.goods.create', compact('categories'));
    }

    public function store(GoodsRequest $goodsRequest)
    {
        $validated = $goodsRequest->validated();

        $replace_harga = str_replace('.','',$goodsRequest->harga);
        $harga = preg_replace("/[^0-9]/", "", $replace_harga);

        $goods = Goods::create([
            'category_id' => $goodsRequest->category_id,
            'nama_barang' => $goodsRequest->nama_barang,
            'harga' => $harga,
            'stok' => $goodsRequest->stok,
        ]);

        return redirect()->route('goods.index')->with('success', 'Data Barang Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $g = Goods::find($id);
        $categories = Category::orderBy('nama_kategori', 'asc')->get();

        return view('admin.goods.edit', compact('g', 'categories'));
    }

    public function update(GoodsRequest $goodsRequest, $id)
    {
        $validated = $goodsRequest->validated();

        $replace_harga = str_replace('.','',$goodsRequest->harga);
        $harga = preg_replace("/[^0-9]/", "", $replace_harga);

        $goods = Goods::find($id)->update([
            'category_id' => $goodsRequest->category_id,
            'nama_barang' => $goodsRequest->nama_barang,
            'harga' => $harga,
            'stok' => $goodsRequest->stok,
        ]);

        return redirect()->route('goods.index')->with('success', 'Data Barang Berhasil di Ubah');
    }

    public function destroy($id)
    {
        $goods = Goods::find($id)->delete();

        return redirect()->route('goods.index')->with('success', 'Data Barang Berhasil di Hapus');
    }
}
