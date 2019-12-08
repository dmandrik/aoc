<?php

namespace Services;

class SolutionsService
{
    /**
     * @param string $from
     * @param string $to
     * @return int
     */
    public function day4SolutionPart1(string $from, string $to): int
    {
        $allowedPasswordList = [];
        for ($i = $from; $i < $to; $i++) {
            $password = str_pad($i, 6, '0', STR_PAD_LEFT);

            if (
                $this->validateAscendingOrder($password)
                && $this->validateAdjacentDigitsAreSame($password)
            ) {
                array_push($allowedPasswordList, $password);
            }
        }

        return count($allowedPasswordList);
    }

    /**
     * @param string $from
     * @param string $to
     * @return int
     */
    public function day4SolutionPart2(string $from, string $to): int
    {
        $allowedPasswordList = [];
        for ($i = $from; $i < $to; $i++) {
            $password = str_pad($i, 6, '0', STR_PAD_LEFT);

            if (
                $this->validateAscendingOrder($password)
                && $this->validateOnlyTwoAdjacentDigitsAreSame($password)
            ) {
                array_push($allowedPasswordList, $password);
            }
        }

        return count($allowedPasswordList);
    }

    /**
     * @param string $password
     * @return int
     */
    private function validateAscendingOrder(string $password): int
    {
        return preg_match('/^(?=\d{6}$)(0*1*2*3*4*5*6*7*8*9*)$/', $password);
    }

    /**
     * Validates if at least one pair of adjacent digits are the same
     *
     * @param string $password
     * @return int
     */
    private function validateAdjacentDigitsAreSame(string $password): int
    {
        return preg_match('/(\d)\1+/', $password);
    }

    /**
     * @param string $password
     * @return bool
     */
    private function validateOnlyTwoAdjacentDigitsAreSame(string $password): bool
    {
        $matches = [];
        if (preg_match_all('/(\d)\1+/', $password, $matches)) {
            foreach ($matches[0] as $match) {
                if (strlen($match) === 2) {
                    return true;
                }
            }
        }

        return false;
    }
}
