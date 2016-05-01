<?php

namespace Kata\RomanNumerals;
/**
 * Class used to convert decimals to numerals and vice versa
 *
 * Class Converter
 * @package Kata\RomanNumerals
 */
class Converter implements RomanNumeralGenerator
{
    /**
     * @var array $roman_numerals
     */
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


    /**
     * Generate a roman numeral from a decimal
     *
     * @param $integer
     * @return string
     */
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

    /**
     * Parse a string to a decimal
     *
     * @param $string
     * @return string
     */
    public function parse($string)
    {
        $number = '';
        $romanNumeral = $string;

        foreach ( $this->roman_numerals as $numeral => $decimal ) {
            while (strpos($romanNumeral, $numeral) === 0) {
                $number += $decimal;
                $romanNumeral = substr($romanNumeral, strlen($numeral));
            }
        }

        return $number;
    }
}
