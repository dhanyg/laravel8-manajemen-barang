<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                $unique = 'unique:user';
                $password = ['required', 'confirmed'];
                break;
            case 'PUT':
                $unique = Rule::unique('user', 'username')->ignore($this->user);
                if (!$this->password) {
                    $password = ['nullable'];
                } else {
                    $password = ['required', 'confirmed'];
                }
                break;
        }
        return [
            'nama' => ['required', 'max:50'],
            'username' => ['required', $unique],
            'password' => $password,
            'admin' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama harus diisi',
            'nama.max' => 'Nama maksimal 50 karakter',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah ada',
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Password tidak sama',
            'password_confirmation.required' => 'Konfirmasi password harus diisi',
        ];
    }
}
