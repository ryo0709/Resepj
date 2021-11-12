<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'お名前を入力してください',
            'name.max' => 'お名前は255文字以内にして下さい',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレス形式で入力してください',
            'email.max' => 'メールアドレス255文字以内で入力してください',
            'email.unique' => '既に使われているメールアドレスです',
            'password.required' => 'パスワードを入力してください',
        ];
    }
}
