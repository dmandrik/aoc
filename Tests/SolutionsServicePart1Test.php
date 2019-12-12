<?php

namespace Test;

include_once './bootstrap.php';

use PHPUnit\Framework\TestCase;
use Services\SolutionsService;

class SolutionsServicePart1Test extends TestCase
{
    private $solutionsService;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->solutionsService = new SolutionsService();
    }

    public function testDay4SolutionPart1ReturnCorrectResultWithProvidedNumbers(): void
    {
        $result = $this->solutionsService->day4SolutionPart1('284639', '748759');
        $this->assertEquals(895, $result);
    }

    public function testDay4SolutionPart1ReturnZeroResultsWhenIntervalNumbersAreEqual(): void
    {
        $result = $this->solutionsService->day4SolutionPart1('284639', '284639');
        $this->assertEquals(0, $result);
    }

    public function testDay4SolutionPart1ReturnZeroResultsWhenFirstNumberIsGreaterThenSecondNumber(): void
    {
        $result = $this->solutionsService->day4SolutionPart1('748759', '284639');
        $this->assertEquals(0, $result);
    }

    public function testDay4SolutionPart1DoesNotCountResultWithoutTwoDigitsInSequence(): void
    {
        $result = $this->solutionsService->day4SolutionPart1('123456', '123457');
        $this->assertEquals(0, $result);
    }

    public function testDay4SolutionPart1DoesNotCountResultWithDigitsNotInAscendingOrder(): void
    {
        $result = $this->solutionsService->day4SolutionPart1('123459', '123461');
        $this->assertEquals(0, $result);
    }

    public function testDay4SolutionPart1DoesCountThreeDigitsInSequence(): void
    {
        $result = $this->solutionsService->day4SolutionPart1('123443', '123445');
        $this->assertEquals(1, $result);
    }
}
