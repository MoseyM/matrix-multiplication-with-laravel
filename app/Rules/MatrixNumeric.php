<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Rule that checks that all items in a 
 * matrix are numeric.
 */
class MatrixNumeric implements Rule
{
    public function passes($attribute, $value)
    {
        foreach($value as $val) {
            $chk = array_filter($val, [$this, 'checkForNumber']);
            if(count($chk)) {
                return false;
            }
        }
        return true;
    }

    public function checkForNumber($value)
    {
        if (!(is_int($value))) {
            return $value;
        }
    }

    public function message()
    {
        return "The :attribute must only contain integers(whole numbers).";
    }
}