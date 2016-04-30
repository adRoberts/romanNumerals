<?php

namespace Kata\RomanNumerals;

interface RomanNumeralGenerator
{
    public function generate($int); // convert from int -> roman

    public function parse($string); // convert from roman -> int
}