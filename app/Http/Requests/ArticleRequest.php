<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()){
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
            'title' => 'required|max:255|min:5',
            'text' => 'required|min:15',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Текстовое поле обязателен для заполнения',
            'title.min' => 'Минимальная днила поля 15-смволов',
            'text.required'  => 'Текстовое поле обязателен для заполнения',
            'text.min'  => 'Минимальная днила поля 5-смволов',
        ];
    }
}
