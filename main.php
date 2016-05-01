<?php

include_once 'src/Kata/RomanNumerals/RomanNumeralGenerator.php';
include_once 'src/Kata/RomanNumerals/Converter.php';

use \Kata\RomanNumerals\Converter;

$converter = new Converter();

if ($_POST) {

    $option = $_POST['convertOption'];
    $value = $_POST['value'];

    $data = array();

    switch($option) {
        case "dec-to-num":
            try {
                $result = $converter->generate($value);
                $status = true;
            } catch(\Exception $e) {
                $result = $e->getMessage();
                $status = false;
            }
            break;
        case "num-to-dec":
            try {
                $result = $converter->parse($value);
                $status = true;
            } catch(\Exception $e) {
                $result = $e->getMessage();
                $status = false;
            }
            break;
    }

    $data = [
        'response' => $result,
        'success' => $status
    ];

    echo json_encode($data);

}

