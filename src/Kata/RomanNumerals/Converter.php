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
    /** @var array $roman_numerals */
    private $romanNumerals = array(
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

    /** @var int $maxValue */
    private $maxValue = 3999;

    /** @var int $minValue */
    private $minValue = 1;

    /** @var string $pattern */
    private $pattern = "/^M{0,3}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/";


    /**
     * Generate a roman numeral from a decimal
     *
     * @param $integer
     * @return string
     * @throws \Exception
     */
    public function generate($integer)
    {
        if ($this->validateDecimal($integer)) {
            $roman = '';

            foreach ($this->romanNumerals as $numeral => $decimal) {
                while ($integer >= $decimal) {
                    $roman .= $numeral;
                    $integer -= $decimal;
                }
            }

            return $roman;
        }

    }

    /**
     * Parse a Roman numeral to a decimal
     *
     * @param $romanNumeral
     * @return string
     * @throws \Exception
     */
    public function parse($romanNumeral)
    {
        if ($this->validateNumeral($romanNumeral)) {
            $number = '';

            foreach ($this->romanNumerals as $numeral => $decimal) {
                while (strpos($romanNumeral, $numeral) === 0) {
                    $number += $decimal;
                    $romanNumeral = substr($romanNumeral, strlen($numeral));
                }
            }

            return $number;
        }

    }

    /**
     * Validate decimal values
     *
     * @param $integer
     * @return bool
     * @throws \Exception
     */
    public function validateDecimal($integer)
    {
        if (!is_numeric($integer)) {
            throw new \InvalidArgumentException('Please enter a valid integer value');
        }

        if ($integer < $this->minValue) {
            throw new \InvalidArgumentException('Value must be greater than or equal to ' . $this->minValue);
        }

        if ($integer > $this->maxValue) {
            throw new \InvalidArgumentException('Value must be less than or equal to ' . $this->maxValue);
        }

        return true;

    }

    /**
     * Validate numeral values
     *
     * @param $numeral
     * @return bool
     * @throws \Exception
     */
    public function validateNumeral($numeral)
    {
        if (!preg_match($this->pattern, $numeral)) {
            throw new \InvalidArgumentException('Please enter a valid Roman numeral');
        }

        return true;

    }
}
