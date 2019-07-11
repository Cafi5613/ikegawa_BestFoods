<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

         public function rules()
    {
        return [
            'title'=>'required|max:15',
            'menu'=>'required|max:15',
            'store_name'=>'required|max:15',
            'image_url'=>'required|image|max:3000',
            'evaluation'=>'required',
            'body'=> 'required|max:500',
            'address'=>'max:50',
            'phone_number'=>'max:12',
            'holiday'=>'max:15',
            'open'=>'max:50',
            'evaluation'=>'required',
        ];
    }

    public function messages(){
        return[
            'title.max'=>'文字数は０〜50文字で入力してください',
            'title.required'=>'入力してください',
            'menu.max'=>'文字数は０〜200文字で入力してください',
            'menu.required'=>'入力してください',
            'store_name.max'=>'文字数は０〜50文字で入力してください',
            'store_name.required'=>'入力してください',
            'body.max'=>'文字数は０〜200文字で入力してください',
            'body.required'=>'入力してください',
            'phone_numbe.max'=>'文字数は０〜50文字で入力してください',
            'phone_number.required'=>'入力してください',
            'phone_number.max'=>'文字数は０〜200文字で入力してください',
            'holiday.required'=>'入力してください',
            'holiday.max'=>'文字数は０〜50文字で入力してください',
            'open.required'=>'入力してください',
            'open.max'=>'文字数は０〜200文字で入力してください',
            'evaluation.required'=>'選択してください',
            'address.required'=>'入力してください',
            'address.max'=>'文字数は０〜200文字で入力してください',
            'image_url.image'=>'ファイルを確認してください',
            'image_url.required'=>'ファイルを選択してください',
        ];
    }
}
