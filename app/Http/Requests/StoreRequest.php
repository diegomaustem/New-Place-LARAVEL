<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'        => 'required',
            'phone'       => 'required',
            'description' => 'required'
        ];
    }

    // Mensagens personalizadas caso precise usar ::: 
    public function messages()
    {
        return [
            'required' => 'Campo :attribute é obrigatório.',
            'min'      => 'Campo deve ter no mínimo :min caracteres.',
            'max'      => 'Campo deve ter no mínimo :max caracteres.'
        ];
    }
}
