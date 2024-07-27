<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'name' => 'required|string',
            'purchace_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'state' => 'boolean',
            'unit_per_pack_id' => 'required|integer',
        ];
       
        // if ($this->isMethod('post')) {
        //     // Règles pour la création
        //     $rules['name'] .= '|unique:products,name';
        // } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
        //     // Règles pour la mise à jour
        //     $productId = $this->route('product');
        //     $rules['name'] .= '|unique:products,name,' . $productId;
        // }
    
        // return $rules;
    }
    
}
