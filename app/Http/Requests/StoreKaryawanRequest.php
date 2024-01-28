<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKaryawanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'nip' => ['required', 'max:50', 'string'],
            'nik' => ['required', 'max:50', 'string'],
            'nama' => ['required', 'max:20', 'string'],
            'jenis_kelamin' => ['required', 'max:50', 'string'],
            'tempat_lahir' => ['required', 'max:50', 'string'],
            'tanggal_lahir' => ['required', 'max:50', 'string'],
            'tanggal_lahir' => ['required', 'max:50', 'string'],
            'telepon' => ['required', 'max:50', 'string'],
            'agama' => ['required', 'max:50', 'string'],
            'status_nikah' => ['required', 'max:50', 'string'],
            'alamat' => ['required', 'max:50', 'string'],
            'foto' => ['required', 'max:50', 'string']
        ];
    }

    public function messages()
    { {
            return [
                'nip.required' => 'Nip karyawan belum diisi!',
                'nik.required' => 'Nik karyawan belum diisi!',
                'nama.required' => 'Nama Kayawan  belum diisi!',
                'jenis_kelamin.required' => 'Jenis Kelamin belum diisi!',
                'tempat_lahir.required' => 'Tempat lahir belum diisi!',
                'tanggal_lahir.required' => 'Tanggal lahir belum diisi!',
                'telepon.required' => 'No telepon belum diisi!',
                'agama.required' => 'Agama belum diisi!',
                'status_nikah.required' => 'Agama belum diisi!',
                'alamat.required' => 'Alamat belum diisi!',
                'foto.required' => 'Foto belum diisi!'

            ];
        }
    }
}
