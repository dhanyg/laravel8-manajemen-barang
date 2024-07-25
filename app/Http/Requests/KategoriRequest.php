<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriRequest extends FormRequest
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
            'nama_kategori' => ['required', 'max:50']
        ];
    }

    public function messages()
    {
        return [
            'nama_kategori.required' => 'Nama Kategori harus diisi',
            'nama_kategori.max' => 'Nama Kategori tidak boleh lebih dari 50 karakter'
        ];
    }
}
