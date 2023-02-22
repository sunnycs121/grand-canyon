<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmployeeIdFormat implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($value && !preg_match('/[a-z A-Z]{2}[-][0-9]{4}/', $value)) {
            $fail('The :attribute must be in format XY-1234.');
        }
    }
}
