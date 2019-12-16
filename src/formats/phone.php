<?php

if (! function_exists('onlyDigits')) {
    /**
     * Remove all non digit charaters from a string
     *
     * @param string $text
     *
     * @return string
     */
    function onlyDigits($text) : string
    {
        return preg_replace('/[^0-9]/', '', $text);
    }
}

if (! function_exists('checkPhoneLength')) {
    /**
     * Determines if a phone number is a legal length North America
     *
     * @param string $number
     *
     * @return bool
     */
    function checkPhoneLength($number) : bool
    {
        return ((strlen($number) == 11 && $number[0] == "1") || (strlen($number) == 10 && $number[0] != "1"));
    }
}

if (! function_exists('formatPhone')) {
    /**
     * formats a phone number
     *
     * @param string $number
     *
     * @throws Exception
     * @return string
     */
    function formatPhone($number) : string
    {
        $number = onlyDigits($number);
        if ( ! checkPhoneLength($number)) {
            throw new Exception('invalid phone number: *' . $number . '*', 0);
        }
        
        return '(' . substr($number, -10, 3) . ') '
            . substr($number, -7, 3) . '-'
            . substr($number, -4, 4);
    }
}