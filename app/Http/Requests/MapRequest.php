<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MapRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

         public function rules()
    {
        return [
            'text'=>'required',
        ];
    }

    public function messages(){
        return[
            'title.max'=>'文字数は０〜50文字で入力してください',
        ];
    }
}
