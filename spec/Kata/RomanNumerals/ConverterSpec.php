<?php

namespace spec\Kata\RomanNumerals;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConverterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kata\RomanNumerals\Converter');
    }

    function it_generates_numbers_to_single_numerals()
    {
        $this->generate(1)->shouldReturn('I');
        $this->generate(5)->shouldReturn('V');
        $this->generate(10)->shouldReturn('X');
        $this->generate(50)->shouldReturn('L');
        $this->generate(100)->shouldReturn('C');
        $this->generate(500)->shouldReturn('D');
        $this->generate(1000)->shouldReturn('M');
    }

    function it_generates_numbers_to_sequences_of_numerals()
    {
        $this->generate(2)->shouldReturn('II');
        $this->generate(3)->shouldReturn('III');
        $this->generate(4)->shouldReturn('IV');
        $this->generate(9)->shouldReturn('IX');
        $this->generate(20)->shouldReturn('XX');
        $this->generate(30)->shouldReturn('XXX');
        $this->generate(40)->shouldReturn('XL');
        $this->generate(90)->shouldReturn('XC');
        $this->generate(400)->shouldReturn('CD');
        $this->generate(900)->shouldReturn('CM');
        $this->generate(3999)->shouldReturn('MMMCMXCIX');
    }

    function it_parses_single_numerals_to_numbers()
    {
        $this->parse('I')->shouldReturn(1);
        $this->parse('V')->shouldReturn(5);
        $this->parse('X')->shouldReturn(10);
        $this->parse('L')->shouldReturn(50);
        $this->parse('C')->shouldReturn(100);
        $this->parse('D')->shouldReturn(500);
        $this->parse('M')->shouldReturn(1000);
    }

    function it_parses_sequences_of_numerals_to_numbers()
    {
        $this->parse('II')->shouldReturn(2);
        $this->parse('III')->shouldReturn(3);
        $this->parse('IV')->shouldReturn(4);
        $this->parse('IX')->shouldReturn(9);
        $this->parse('XX')->shouldReturn(20);
        $this->parse('XXX')->shouldReturn(30);
        $this->parse('XL')->shouldReturn(40);
        $this->parse('XC')->shouldReturn(90);
        $this->parse('CD')->shouldReturn(400);
        $this->parse('CM')->shouldReturn(900);
        $this->parse('MMMCMXCIX')->shouldReturn(3999);
    }

    function it_validates_valid_decimal_numbers()
    {
        $this->validateDecimal(1)->shouldReturn(true);
        $this->validateDecimal(5)->shouldReturn(true);
        $this->validateDecimal(10)->shouldReturn(true);
        $this->validateDecimal(50)->shouldReturn(true);
        $this->validateDecimal(100)->shouldReturn(true);
        $this->validateDecimal(500)->shouldReturn(true);
        $this->validateDecimal(1000)->shouldReturn(true);
    }

    function it_validates_invalid_decimal_numbers()
    {
        $this->shouldThrow('\InvalidArgumentException')->during('validateDecimal', array(-1));
        $this->shouldThrow('\InvalidArgumentException')->during('validateDecimal', array(4000));
        $this->shouldThrow('\InvalidArgumentException')->during('validateDecimal', array('a test string'));
    }

    function it_validates_valid_roman_numerals()
    {
        $this->validateNumeral('I')->shouldReturn(true);
        $this->validateNumeral('V')->shouldReturn(true);
        $this->validateNumeral('M')->shouldReturn(true);
        $this->validateNumeral('II')->shouldReturn(true);
        $this->validateNumeral('IX')->shouldReturn(true);
        $this->validateNumeral('XX')->shouldReturn(true);
        $this->validateNumeral('XXX')->shouldReturn(true);
        $this->validateNumeral('CD')->shouldReturn(true);
        $this->validateNumeral('CM')->shouldReturn(true);
        $this->validateNumeral('MMMCMXCIX')->shouldReturn(true);
    }

    function it_validates_invalid_roman_numerals()
    {
        $this->shouldThrow('\InvalidArgumentException')->during('validateNumeral', array('F'));
        $this->shouldThrow('\InvalidArgumentException')->during('validateNumeral', array('a test string'));
        $this->shouldThrow('\InvalidArgumentException')->during('validateNumeral', array(12345));
    }
}
