<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'users_id' => 'required',
            'nama' => 'string',
            'nama_usaha' => 'string',
            'no_surat' => 'string',
            'jenis_kelamin' => 'string',
            'tempat_lahir' => 'string',
            'tanggal_lahir' => 'string',
            'alamat' => 'string',
            'pekerjaan' => 'string',
            'rt_rw' => 'string',
            'kelurahan' => 'string',
            'kecamatan' => 'string',
            'agama' => 'string',
            'status_perkawinan' => 'string',
            'no_nik' => 'string',
            'posisi' => 'string',
            'status' => 'string',
            'jenis_surat' => 'string',
            'foto_ktp' => 'string|required|mimes:jpeg,jpg,png',
            'foto_kk' => 'string|required|mimes:jpeg,jpg,png',
            'foto_surat_rt_rw' => 'string|required|mimes:jpeg,jpg,png',
        ];
    }
}
