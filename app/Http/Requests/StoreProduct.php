<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
		$teste = $this->route();
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request){
		$product_id = $request->input('id');
		if ($product_id){
			$validation_sku = 'required|max:255|unique:products,id,'.$product_id;
		} else {
			$validation_sku = 'required|max:255|unique:products';	
		}
		
		$validation = [
			'sku' => $validation_sku,
			'name' => 'required|max:255',
			'description' => 'required',
			'price' => 'required',
		];
		return $validation;
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
