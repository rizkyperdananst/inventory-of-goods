<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GoodsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|integer',
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Nama kategori harus diisi',
            'category_id.integer' => 'Nama kategori harus benar',
            'nama_barang.required' => 'Nama barang harus diisi',
            'harga.required' => 'Harga barang harus diisi',
            'stok.required' => 'Stok barang harus diisi',
        ];
    }
}
