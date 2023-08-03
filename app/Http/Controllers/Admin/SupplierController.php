<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::orderBy('id', 'desc')->get();

        return view('admin.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(SupplierRequest $supplierRequest)
    {
        $validated = $supplierRequest->validated();

        $supplier = Supplier::create($validated);

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil ditambahkan');
    }

    public function edit($id)
    {
        $s = Supplier::find($id);

        return view('admin.supplier.edit', compact('s'));
    }

    public function update(SupplierRequest $supplierRequest, $id)
    {
        $validated = $supplierRequest->validated();

        $supplier = Supplier::find($id)->update($validated);

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil di Ubah');
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id)->delete();
        
        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil di Hapus');
    }
}
