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

        return [
            'username' => $this->method('post') ? ['required', 'string', 'max:255',Rule::unique('users', 'username'),'alpha_dash'] : ['required', 'string', 'max:255',Rule::unique('users', 'username')->ignore($this->user->username,'username'),'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => $this->method('post') ?['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')] : ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user->email,'email')],
            'avatar' => ['nullable','file'],
            'password' => ['required', 'string', 'min:8','confirmed'],

        ];
    }
}
