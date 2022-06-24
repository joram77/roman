<?php

namespace App\Service;

class NumberConvertService
{
    const MAX_NUMBER = 3999;
    const ARABIC_TO_ROMAN_CHARS = [
        [1000, 'M'],
        [900, 'CM'],
        [500, 'D'],
        [400, 'CD'],
        [100, 'C'],
        [90, 'XC'],
        [50, 'L'],
        [40, 'XL'],
        [10, 'X'],
        [9, 'IX'],
        [5, 'V'],
        [4, 'IV'],
        [1, 'I']
    ];

    /**
     * Gets the Roman numeral representation for an arabic number, given the number is in a valid range.
     * @param int $number
     * @return string
     */
    function arabicToRoman(int $number): ?string
    {
        if ($number > 0 && $number <= self::MAX_NUMBER) {
            return $this->arabicToRomanAlgorithm($number);
        } else {
            return null;
        }
    }

    /**
     * Calculate the Roman numeral sequence for an integer by continuously subtracting the next highest fitting
     * Roman numeral, then appending that numeral to the result sequence.
     * Do this until the remainder is zero and the full sequence of Roman characters is formed.
     * @param int $number
     * @return string
     */
    private function arabicToRomanAlgorithm(int $number): string
    {
        $romanSequence = '';
        $remaining = $number;
        $i = 0;
        $total = count(self::ARABIC_TO_ROMAN_CHARS);
        while ($i < $total) {
            $arabic = self::ARABIC_TO_ROMAN_CHARS[$i][0];
            if ($remaining >= $arabic) {
                $roman = self::ARABIC_TO_ROMAN_CHARS[$i][1];
                $romanSequence .= $roman;
                $remaining -= $arabic;
            } else $i++;
        }
        return $romanSequence;
    }
}