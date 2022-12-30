<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
                'email' => ['required',
                    'email',
                    Rule::unique('contacts','email')
                        ->where('user_id',auth()->id())
                        ->ignore(request()->route('contact'))
                ],
                'photo' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
          'email.unique' => 'You already have a contact with this email'
        ];
    }
}
