<?php

namespace App\Tests\Service;

use App\Service\NumberConvertService;
use PHPUnit\Framework\TestCase;
use Romans\Filter\IntToRoman;

class NumberConvertServiceTest extends TestCase
{
    private NumberConvertService $convertService;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->convertService = new NumberConvertService(new IntToRoman());
    }

    public function testArabicToRomanI(): void
    {
        $this->assertSame('I', $this->convertService->arabicToRoman(1));
    }

    public function testArabicToRomanIV(): void
    {
        $this->assertSame('IV', $this->convertService->arabicToRoman(4));
    }

    public function testArabicToRomanV(): void
    {
        $this->assertSame('V', $this->convertService->arabicToRoman(5));
    }

    public function testArabicToRomanX(): void
    {
        $this->assertSame('X', $this->convertService->arabicToRoman(10));
    }

    public function testArabicToRomanMMMCMXCIX(): void
    {
        $this->assertSame('MMMCMXCIX', $this->convertService->arabicToRoman(3999));
    }

    public function testArabicToRomanZero(): void
    {
        $this->assertSame(null, $this->convertService->arabicToRoman(0));
    }

    public function testArabicToRomanNegative(): void
    {
        $this->assertSame(null, $this->convertService->arabicToRoman(-1));
    }

    public function testArabicToRomanOutOfRange(): void
    {
        $this->assertSame(null, $this->convertService->arabicToRoman(4000));
    }

}
