<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
    public function rules(){
        return [
			'sku' => 'required|unique:products|max:255',
			'name' => 'required|max:255',
			'description' => 'required',
			'price' => 'required',
		];
    }
	
	public function messages(){
		return [
			'sku.required' => 'SKU não preenchido.',
			'sku.unique' => 'SKU já cadastrado.',
			'sku.max' => 'SKU deve ter no máximo 255 caracteres.',
			'name.required'  => 'Nome não prenchido.',
			'name.max'  => 'Nome deve ter no máximo 255 caracteres.',
			'description.required'  => 'Desrição não preenchida.',
			'price.required'  => 'Preço não preenchido.',
		];
	}
}
