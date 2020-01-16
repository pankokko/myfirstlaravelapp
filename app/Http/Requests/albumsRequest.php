<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class albumsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->path() == "albums/new")
        {
          return true ;
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
            "albumtitle" => "required",
            "thumbnail" => "required",
            "description" => "required"
        ];
    }

    public function messages()
    {
    return [
        "albumtitle.required" => "*アルバムのタイトルは必須です。",
        "thumbnail.required" => "*サムネイルは必須です。",
        "description.required" => "*説明文は必須です。",
    ];
    }
}
