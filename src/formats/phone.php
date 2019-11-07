<?php


function onlyDigits($text)
{
    return preg_replace('/[^0-9]/', '', $text);
}

function checkPhoneLength($number)
{
    return ((strlen($number) == 11 && $number[0] == "1") || (strlen($number) == 10 && $number[0] != "1"));
}

function formatPhone($number)
{
    $number = onlyDigits($number);
    if ( ! checkPhoneLength($number)) {
        throw new Exception('invalid phone number: *' . $number . '*', 0);
    }
    
    return '(' . substr($number, -10, 3) . ') '
        . substr($number, -7, 3) . '-'
        . substr($number, -4, 4);
}