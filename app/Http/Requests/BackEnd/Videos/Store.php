<?php

namespace App\Http\Requests\BackEnd\Videos;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'name' => ['required', 'string', 'max:191'],
            'des' => ['required', 'max:191', 'min:10'],  
            'cat_id'=> ['required','integer'],
            'published'=>['required'],
            'video'=>['required'],
            'image'=>['required', 'image'],
        ];
    }
}
