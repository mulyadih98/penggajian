<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUser extends FormRequest
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
            "nip" => "string|required|unique:users,nip",
            "nama_lengkap" => "required|string",
            "email" => "email|required|unique:users,email",
            "jabatan_id" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "alamat" => "required",
            "no_telepon" => "required",
            "agama" => "required",
        ];
    }
}
