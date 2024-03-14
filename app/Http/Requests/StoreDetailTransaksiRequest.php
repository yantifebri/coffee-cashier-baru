<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDetailTransaksiRequest extends FormRequest
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
            'transaksi_id' => ['required', 'string'],
            'menu_id' => ['required', 'string'],
            'jumlah' => ['required'],
            'subtotal' => ['required']
        ];
    }
    public function messages()
    { {
            return [
                'transaksi_id.required' => 'Nama menu belum diisi!',
                'jam_mulai.required' => 'Harga belum diisi!',
                'menu_id.required' => 'Image belum diisi!',
                'jumlah.required' => 'Deskripsi belum diisi!',
                'subtotal.required' => 'Image belum diisi!'

            ];
        }
    }
}
