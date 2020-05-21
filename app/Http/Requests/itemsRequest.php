<?php

namespace App\Http\Requests;

use App\Rules\kana;
use Illuminate\Foundation\Http\FormRequest;

class itemsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       if($this->path() == "items/new" || "albums/add" )
       {

       return true;
    }else{
        return false;
    }
}
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'title'       => 'required',
             'path'        => 'required',
             'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'         => '*タイトルは必ず入力してください',
            'path.required'          =>  '*画像は必ず選択してください',
            'category_id.required'   => '*カテゴリーは必ず選択してください'
        ];
    }
}
