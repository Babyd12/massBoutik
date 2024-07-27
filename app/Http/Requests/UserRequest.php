<?php

namespace App\Http\Requests;

use App\Enums\Indicative;
use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    public function rules(): array
    {
        /**
         * @return App\Enum\Indicative
         */
        $indicatives = Indicative::cases();

        // convert enum to array of values
        $indicativeValues =  array_map(fn($case) => $case->value, $indicatives);
        
        // join array to string for validation rule in request
        $indicativeValuesString = implode(',', $indicativeValues);

        $indicativeInstance = '';
        // store indicative instance if is in 
        foreach($indicatives as $indicative)
        {
            if($indicative->value == $this->input('indicative') ){
             
                $indicativeInstance = $indicative;
                break;
            }
        }
      
        /**
         * @return array 
         * @info convert indicative instances in array
         */

        /**
         * @return string
         */
        
        if ($indicativeInstance && !in_array($indicativeInstance->value, $indicativeValues)) {
            //Because the field indidcative in not valide i return invalid for this field
            return [
                'indicative' => 'required|in:trusUser001@#iconX****ak99**',
            ];
        }
        
        return [
			'full_name' => 'required|string',
			'nick_name' => 'nullable|string',
			'description' => 'nullable|string',
			'email' => 'nullable|string',
			'role' => 'required|string|in:customer',
            'picture' => 'nullable|image',
            'phone' => ['nullable', new PhoneNumber($indicativeInstance)],
            'indicative' => 'required_with:phone|integer|in:'.$indicativeValuesString,


        ];
    }
}
