<?php

namespace Test;

include_once './bootstrap.php';

use PHPUnit\Framework\TestCase;
use Controllers\AdventOfCodeController;

class AdventOfCodeControllerTest extends TestCase
{
    private $adventOfCodeController;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->adventOfCodeController = new AdventOfCodeController();
    }

    public function testDay4PuzzleAcceptOnlyDigits(): void
    {
        $result = $this->adventOfCodeController->day4Puzzle('abcdef', '123456');
        $this->assertTrue(array_key_exists('error', $result));

        $result = $this->adventOfCodeController->day4Puzzle('123456', 'abcdef');
        $this->assertTrue(array_key_exists('error', $result));

        $result = $this->adventOfCodeController->day4Puzzle('', '');
        $this->assertTrue(array_key_exists('error', $result));

        $result = $this->adventOfCodeController->day4Puzzle('123546', '123.45');
        $this->assertTrue(array_key_exists('error', $result));

        $result = $this->adventOfCodeController->day4Puzzle('123', '123456');
        $this->assertTrue(array_key_exists('error', $result));

        $result = $this->adventOfCodeController->day4Puzzle('123456', '123');
        $this->assertTrue(array_key_exists('error', $result));

        $result = $this->adventOfCodeController->day4Puzzle('1234567', '123456');
        $this->assertTrue(array_key_exists('error', $result));

        $result = $this->adventOfCodeController->day4Puzzle('123456', '1234567');
        $this->assertTrue(array_key_exists('error', $result));

        $result = $this->adventOfCodeController->day4Puzzle('12345 ', '123456');
        $this->assertTrue(array_key_exists('error', $result));

        $result = $this->adventOfCodeController->day4Puzzle('123456', '12345 ');
        $this->assertTrue(array_key_exists('error', $result));

        $result = $this->adventOfCodeController->day4Puzzle('-23456', '123456');
        $this->assertTrue(array_key_exists('error', $result));
    }

    public function testDay4PuzzleDoesNotReturnAnErrorOnCorrectInterval()
    {
        $result = $this->adventOfCodeController->day4Puzzle('284639', '748759');
        $this->assertFalse(array_key_exists('error', $result));
        $this->assertEquals($this->formatExpectedResult(895, 591), $result);
    }

    private function formatExpectedResult(int $expectedResultPart1, int $expectedResultPart2): array
    {
        return [
            'part1' => "Amount of possible passwords: {$expectedResultPart1}",
            'part2' => "Amount of possible passwords: {$expectedResultPart2}"
        ];
    }
}
