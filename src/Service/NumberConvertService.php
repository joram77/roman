<?php

namespace App\Service;

use Romans\Filter\Exception;
use Romans\Filter\IntToRoman;

class NumberConvertService
{
    const MAX_NUMBER = 3999;
    private IntToRoman $intToRomanService;

    /**
     * NumberConvertService constructor.
     * @param IntToRoman $intToRomanService
     */
    public function __construct(IntToRoman $intToRomanService)
    {
        $this->intToRomanService = $intToRomanService;
    }

    /**
     * @param int $number
     * @return string
     * @throws Exception
     */
    function arabicToRoman(int $number): string
    {
        return $this->intToRomanService->filter($number);
    }

}