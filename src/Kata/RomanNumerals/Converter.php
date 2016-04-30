<?php

namespace Kata\RomanNumerals;

class Converter implements RomanNumeralGenerator
{
    private $roman_numerals = array(
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1);


    public function generate($integer)
    {
        $roman = '';
        $remainder = $integer;

        foreach ( $this->roman_numerals as $numeral => $decimal ) {
            while ($remainder >= $decimal) {
                $roman .= $numeral;
                $remainder -= $decimal;
            }
        }

        return $roman;
    }

    public function parse($string)
    {
        $number = '';
        $romanNumeral = $string;

        foreach ( $this->roman_numerals as $numeral => $decimal ) {

            //while the roman numeral value appears at the start of the supplied string
            while (strpos($romanNumeral, $numeral) === 0) {
                //add the associated integer value to the result
                $number += $decimal;
                //remove the successfully converted numeral from the supplied string
                $romanNumeral = substr($romanNumeral, strlen($numeral));
            }
        }

        return $number;
    }
}
