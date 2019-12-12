<?php

namespace Test;

include_once './bootstrap.php';

use PHPUnit\Framework\TestCase;
use Services\SolutionsService;

class SolutionsServicePart2Test extends TestCase
{
    private $solutionsService;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->solutionsService = new SolutionsService();
    }

    public function testDay4SolutionPart2ReturnCorrectResultWithProvidedNumbers(): void
    {
        $result = $this->solutionsService->day4SolutionPart2('284639', '748759');
        $this->assertEquals(591, $result);
    }

    public function testDay4SolutionPart2ReturnZeroResultsWhenIntervalNumbersAreEqual(): void
    {
        $result = $this->solutionsService->day4SolutionPart2('284639', '284639');
        $this->assertEquals(0, $result);
    }

    public function testDay4SolutionPart2ReturnZeroResultsWhenFirstNumberIsGreaterThenSecondNumber(): void
    {
        $result = $this->solutionsService->day4SolutionPart2('748759', '284639');
        $this->assertEquals(0, $result);
    }

    public function testDay4SolutionPart2DoesNotCountResultWithoutTwoDigitsInSequence(): void
    {
        $result = $this->solutionsService->day4SolutionPart2('123456', '123457');
        $this->assertEquals(0, $result);
    }

    public function testDay4SolutionPart2DoesNotCountResultWithDigitsNotInAscendingOrder(): void
    {
        $result = $this->solutionsService->day4SolutionPart2('123459', '123461');
        $this->assertEquals(0, $result);
    }

    public function testDay4SolutionPart2DoesNotCountThreeDigitsInSequence(): void
    {
        $result = $this->solutionsService->day4SolutionPart2('123443', '123445');
        $this->assertEquals(0, $result);
    }
}
