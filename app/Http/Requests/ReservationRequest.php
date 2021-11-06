<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ReservationRequest extends FormRequest
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
            'user_id' => 'required',
            'shop_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'num_of_users' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'time.required' => '時間を入力してください',
            'num_of_users.required' => 'ご利用人数を入力してください',
        ];
    }
}
