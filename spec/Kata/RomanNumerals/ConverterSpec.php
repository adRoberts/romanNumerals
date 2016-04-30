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

    function it_generates_zero_to_an_empty_string()
    {
        $this->generate(0)->shouldReturn('');
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
}
