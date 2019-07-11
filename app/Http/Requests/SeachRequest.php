<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeachRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

         public function rules()
    {
        return [
            'genre'=>'required',
        ];
    }

    public function messages(){
        return[
            'genre'=>'文字数は０〜50文字で入力してください',
        ];
    }
}
