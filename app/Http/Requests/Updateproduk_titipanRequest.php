<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updateproduk_titipanRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_produk' => 'required|string',
            'nama_supplier' => 'required|string',
            'harga_beli' => 'required|string',
            'harga_jual' => 'required|string',
            'stok' => 'required|string',
            'keterangan' => 'required|string'
        ];
    }
}
