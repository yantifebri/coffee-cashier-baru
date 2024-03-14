<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storeproduk_titipanRequest extends FormRequest
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
            'nama_produk' => ['required', 'max:50', 'string'],
            'nama_supplier' => ['required', 'max:50', 'string'],
            'harga_beli' => ['required', 'max:20', 'string'],
            'harga_jual' => ['required', 'max:20', 'string'],
            'stok' => ['required', 'max:20', 'string'],
            'keterangan' => ['required', 'max:20', 'string'],

           
        ];
    }
}
