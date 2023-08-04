<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BuyRequest extends FormRequest
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
            'supplier_id' => 'required|integer',
            'goods_id' => 'required|integer',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'supplier_id.required' => 'Supplier harus diisi',
            'supplier_id.integer' => 'Pastikan nama supplier benar',
            'goods_id.required' => 'Barang harus diisi',
            'goods_id.integer' => 'Pastikan nama barang benar',
            'tanggal.required' => 'Tanggal harus diisi',
            'tanggal.date' => 'Pastikan tanggal benar',
            'jumlah.required' => 'Jumlah harus diisi',
            'jumlah.integer' => 'Pastikan jumlah benar',
        ];
    }
}
