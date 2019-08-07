<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FullMatrix implements Rule
{
    
    public function passes($attribute, $value)
    {
        // If there is only one row no need to make check
        if( count($value) !== 1) {
            // set a length value
            $currentLength = count($value[0]);
            for($i=0; $i < count($value); $i++) {
                if( count($value[$i]) !== $currentLength) return false;
            }
        }
        return true;
    }

    public function message()
    {
        return "The :attribute must not contain null or empty values.";
    }

}