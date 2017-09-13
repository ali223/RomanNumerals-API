<?php

namespace App;

class IntegerConversion implements IntegerConversionInterface
{

    protected $romanToDecimalMap = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I',        
    
    ];   

    public function toRomanNumerals($integer) 
    {
        $romanNumeral = '';

        if(isset($this->romanToDecimalMap[$integer])) {
            return $this->romanToDecimalMap[$integer];
        }

        foreach($this->romanToDecimalMap as $decimal => $roman) {
            if($decimal <= $integer) {
                $romanNumeral .= str_repeat($roman, $integer/$decimal);
                $integer = $integer % $decimal;

            }
        }

        return $romanNumeral;
    }
}