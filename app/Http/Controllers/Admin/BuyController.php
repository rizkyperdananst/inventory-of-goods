<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BuyRequest;
use App\Models\Buy;
use App\Models\Goods;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function index()
    {
        $buys = Buy::with('suppliers', 'goods')->get();

        return view('admin.buy.index', compact('buys'));
    }

    public function create()
    {
        $suppliers = Supplier::orderBy('nama_supplier', 'asc')->get();
        $goods = Goods::orderBy('nama_barang', 'asc')->get();

        return view('admin.buy.create', compact('suppliers', 'goods'));
    }

    public function store(BuyRequest $buyRequest)
    {
        $validated = $buyRequest->validated();

        $goods = Goods::where('id', $buyRequest->goods_id)->pluck('stok')->first();

        if($buyRequest->jumlah) {
            $stok = $goods - $buyRequest->jumlah;
            Goods::find($buyRequest->goods_id)->update([
                'stok' => $stok
            ]);
        }

        $buy = Buy::create($validated);

        return redirect()->route('buy.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $buy = Buy::findOrFail($id);
        $suppliers = Supplier::orderBy('nama_supplier', 'asc')->get();
        $goods = Goods::orderBy('nama_barang', 'asc')->get();

        return view('admin.buy.edit', compact('buy', 'suppliers', 'goods'));
    }
}
