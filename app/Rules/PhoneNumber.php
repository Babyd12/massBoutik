<?php

namespace App\Rules;

use App\Enums\Indicative;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneNumber implements ValidationRule
{

    protected $indicative;

    public function __construct(Indicative $indicative)
    {
        $this->indicative = $indicative;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        switch ($this->indicative) {
            
            case Indicative::SENEGAL:
                if (!preg_match('/^[0-9]{9}$/', $value)) {
                    $fail('The :attribute must be a valid phone number with 9 digits for indicative 221.');
                }
                break;
            

            default:
                if (!preg_match('/^[0-9]{10,15}$/', $value)) {
                    $fail('The :attribute must be a valid phone number.');
                }
                break;
        }
       
    }
}
