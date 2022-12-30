<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
                'name' => 'required',
                'phone_number' => 'required|digits:9',
                'age' => 'required|numeric|min:1|max:105',
                'email' => 'required|email',
                'photo' => 'nullable|image'
        ];
    }
}
