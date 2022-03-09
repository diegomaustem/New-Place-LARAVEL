<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
           'description' => 'required',
           'body'        => 'required',
           'price'       => 'required',
           'photos'       => 'image'
        ];
    }

    // Mensagens personalizadas caso precise usar :::
    public function messages()
    {
        return [
            'required' => 'Campo :attribute é obrigatório.',
            'min'      => 'Campo deve ter no mínimo :min caracteres.',
            'max'      => 'Campo deve ter no mínimo :max caracteres.',
            'image'    => 'Arquivo não é uma imagem válida.',
        ];
    }
}
