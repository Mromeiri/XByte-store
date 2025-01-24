<?php
function numberToWord($number) {
    $words = array(
        0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',
        5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen',
        14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen',
        18 => 'eighteen', 19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty', 70 => 'seventy',
        80 => 'eighty', 90 => 'ninety'
    );

    if ($number <= 20) {
        return $words[$number];
    }

    if ($number < 100) {
        $tens = floor($number / 10) * 10;
        $units = $number % 10;
        return $words[$tens] . '-' . $words[$units];
    }

    if ($number < 1000) {
        $hundreds = floor($number / 100);
        $remaining = $number % 100;

        $result = $words[$hundreds] . ' hundred';

        if ($remaining > 0) {
            $result .= ' and ' . numberToWord($remaining);
        }

        return $result;
    }

    if ($number <= 1000000) {
        $thousands = floor($number / 1000);
        $remaining = $number % 1000;

        $result = numberToWord($thousands) . ' thousand';

        if ($remaining > 0) {
            $result .= ' ' . numberToWord($remaining);
        }

        return $result;
    }

    return $number; // For numbers greater than 1000000, return as is
}

// Example usage:
$number = 1000000;
echo numberToWord($number); // Outputs "five hundred sixty-seven thousand eight hundred ninety-one"

?>