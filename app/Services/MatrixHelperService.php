<?php
namespace App\Services;

/**
 * This class handles common operations 
 * relating to matrices.
 */
class MatrixHelperService
{
    protected $alpha = [
        1 => 'A',
        2 => 'B',
        3 => 'C',
        4 => 'D',
        5 => 'E',
        6 => 'F',
        7 => 'G',
        8 => 'H',
        9 => 'I',
        10 => 'J',
        11 => 'K',
        12 => 'L',
        13 => 'M',
        14 => 'N',
        15 => 'O',
        16 => 'P',
        17 => 'Q',
        18 => 'R',
        19 => 'S',
        20 => 'T',
        21 => 'U',
        22 => 'V',
        23 => 'W',
        24 => 'X',
        25 => 'Y',
        26 => 'Z',
    ];

    /**
     * Multiply two matrices together and retrieves product.
     * 
     * @param array   $a
     * @param array   $b
     * @param boolean $showAlpha
     * 
     * @return array
     */
    public function getMultiMatrix($a, $b, $showAlpha = false)
    {
        $final = [];
        for($i=0; $i < count($b[0]); $i++) {
            $currentColumn = array_map('array_shift', $b);
            foreach($a as $currentRow){
                $cellSum = $this->calcSum($currentRow,$currentColumn);
                $final[$i][] = ($showAlpha) 
                                ? $this->parseToAlpha($cellSum)
                                : $cellSum;
            }
            //Remove the first index from each array
            foreach($b as $ind => $bg) {
                array_shift($bg);
                $b[$ind] = $bg;
            }
        }
        return $final;
    }

    /**
     * Sums the product of two equally-length array.
     * 
     * @param  array $first
     * @param  array $second
     * 
     * @return int
     */
    private function calcSum($first, $second)
    {
        $total = 0;
        for($i=0; $i<count($first); $i++) {
            $total += $first[$i]*$second[$i];
        }
        return $total;
    }

    /**
     * Retrieves the alpha representation for the parameter.
     * 
     * @param int $key
     * 
     * @return string
     */
    public function parseToAlpha($key)
    {
        $totalChars = count($this->alpha);
        if ($key < $totalChars) {
            return $this->alpha[$key];
        } else {
            //Get the int to determine the first letter.
            $index = floor($key/$totalChars);
            $alpha = $this->alpha[$index];
            //Take the remainder and find the index of the second letter.
            $alpha += $this->alpha[$key - ($totalChars*$index)];
            return $alpha;
        }
    }
}