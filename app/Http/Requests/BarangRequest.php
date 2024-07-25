<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
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
            'id_kategori' => ['required'],
            'nama' => ['required', 'max:100'],
            'deskripsi' => ['nullable'],
            'gambar' => ['nullable', 'image', 'max:1024'],
        ];
    }

    public function messages()
    {
        return [
            'id_kategori.required' => 'Kategori harus diisi',
            'nama.required' => 'Nama barang harus diisi',
            'nama.max' => 'Nama barang maksimal 100 karakter',
            'gambar.image' => 'Gambar harus berupa gambar',
            'gambar.max' => 'Gambar maksimal 1MB',
        ];
    }
}
