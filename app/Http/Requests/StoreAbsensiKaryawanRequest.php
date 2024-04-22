<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAbsensiKaryawanRequest extends FormRequest
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
            'namaKaryawan' => ' required',
            'tanggalMasuk' => 'required', 
            'waktuMasuk' =>'required', 
            'status' =>'required', 
            'waktuKeluar' => 'required'


        ];
    }

    public function messages()
    { {
            return [
                'namaKaryawan.required' => 'Nama karyawan belum diisi!',
                'tanggalMasuk.required' => 'Tanggal masuk belum diisi!',
                'waktuMasuk.required' => 'Waktu masuk belum diisi!',
                'status.required' => 'Status belum diisi!',
                'waktuKeluar.required' => 'Waktu keluar belum diisi!',


            ];
        }
    }
}
