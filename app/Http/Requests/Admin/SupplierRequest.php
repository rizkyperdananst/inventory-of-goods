<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'nama_supplier' => 'required',
            'telepon' => 'required|min:11|max:13|unique:suppliers,telepon',
            'alamat' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_supplier.required' => 'Nama supplier harus diisi',
            'telepon.required' => 'Telepon harus diisi',
            'telepon.min' => 'Telepon minimal 11 angka',
            'telepon.max' => 'Telepon maximal 13 angka',
            'telepon.unique' => 'Telepon yang anda masukkan sudah ada',
            'alamat.required' => 'Alamat harus diisi',
        ];
    }
}
