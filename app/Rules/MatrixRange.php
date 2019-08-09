<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Rule that determines if a matrix 
 * numeric values are within a set range.
 */
class MatrixRange implements Rule
{
    protected $min;
    protected $max;

    /**
     * Creates a new rule instance.
     * 
     * @param int $min The minimum for the range
     * @param int $max The maximum for the range
     * 
     * @return void
     */
    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function passes($attribute, $value)
    {
        foreach($value as $val) {
            $chk = array_filter($val, [$this, 'checkRange']);
            if(count($chk)) {
                return false;
            }
        }
        return true;
    }

    public function checkRange($value)
    {
        if( ($value < $this->min) || ($value > $this->max)) {
            return $value;
        }
    }

    public function message()
    {
        return "The :attribute must only contain numbers between {$this->min} and {$this->max}";
    }
}