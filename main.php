<?php

include_once 'src/Kata/RomanNumerals/RomanNumeralGenerator.php';
include_once 'src/Kata/RomanNumerals/Converter.php';

use \Kata\RomanNumerals\Converter;

$converter = new Converter();

if ($_POST) {

    $option = $_POST['convertOption'];
    $value = $_POST['value'];

    $data = array();

    try {
        switch ($option) {
            case "dec-to-num":
                $result = $converter->generate($value);
                break;
            case "num-to-dec":
                $result = $converter->parse($value);
                break;
        }
        $status = true;
    } catch (\InvalidArgumentException $e) {
        $result = $e->getMessage();
        $status = false;
    }


    $data = [
        'response' => $result,
        'success' => $status
    ];

    echo json_encode($data);

}

