<?php

namespace Controllers;

use Services\SolutionsService;

class AdventOfCodeController
{
    /**
     * @var SolutionsService
     */
    private $solutionsService;

    /**
     * AdventOfCodeController constructor.
     */
    public function __construct()
    {
        $this->solutionsService = new SolutionsService();
    }

    /**
     * @param string $from
     * @param string $to
     * @return array
     */
    public function day4Puzzle(string $from, string $to): array
    {
        if (!$this->validateDay4Puzzle($from, $to)) {
            return [
                'error' => "Validation failed. Input 'from' and 'to' must use only digits and be length of 6."
            ];
        }

        $amountOfAllowedPasswordsPart1 = $this->solutionsService->day4SolutionPart1($from, $to);
        $amountOfAllowedPasswordsPart2 = $this->solutionsService->day4SolutionPart2($from, $to);

        return [
            'part1' => "Amount of possible passwords: {$amountOfAllowedPasswordsPart1}",
            'part2' => "Amount of possible passwords: {$amountOfAllowedPasswordsPart2}"
        ];
    }

    /**
     * @param string $from
     * @param string $to
     * @return bool
     */
    private function validateDay4Puzzle(string $from, string $to): bool
    {
        return $this->validateSixDigits($from)
            && $this->validateSixDigits($to);
    }

    /**
     * @param string $data
     * @return int
     */
    private function validateSixDigits(string $data): int
    {
        return preg_match('/^\d{6}$/', $data);
    }
}
