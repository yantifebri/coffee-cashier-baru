<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'nama_menu' => ['required', 'max:50', 'string'],
            'harga' => ['required', 'max:50', 'string'],
            'image' => ['required', 'max:20', 'string'],
            'deskripsi' => ['required', 'max:50', 'string'],
            
        ];
    }

    public function messages()
    { {
            return [
                'nama_menu.required' => 'Nip karyawan belum diisi!',
                'harga.required' => 'Nik karyawan belum diisi!',
                'image.required' => 'Nama Kayawan  belum diisi!',
                'deskripsi.required' => 'Jenis Kelamin belum diisi!',

            ];
        }
    }
}
