<?php

namespace adventofcode\Year2020;

class ExpenseReport
{
    /**
     * Checks a list of expense report values and finds which two items sum to a certain number. Returns an array
     * containing the two numbers.
     *
     * @param int $sumToFind
     * @param array $expenses
     * @return array|int
     */
    public function findTwoThatSumsTo(int $sumToFind, array $expenses): array
    {
        sort($expenses, SORT_NUMERIC);

        $head = 0;
        $tail = count($expenses) - 1;

        while ($head < $tail) {
            $sum = $expenses[$head] + $expenses[$tail];

            if ($sum === $sumToFind) {
                return [
                    intval($expenses[$head]),
                    intval($expenses[$tail]),
                ];
            }

            if ($sum < $sumToFind) {
                $head++;
            }

            if ($sum > $sumToFind) {
                $tail--;
            }
        }

        return [];
    }

    /**
     * Checks a list of expense report values and finds which three items sum to a certain number. Returns an array
     * containing the three numbers.
     *
     * @param int $sumToFind
     * @param array $expenses
     * @return array|int
     */
    public function findThreeThatSumsTo(int $sumToFind, array $expenses): array
    {
        sort($expenses, SORT_NUMERIC);

        $tail = count($expenses) - 1;

        for ($i = 0; $i < count($expenses); $i++) {
            $head = $i + 1;

            while ($head < $tail) {
                $sum = $expenses[$i] + $expenses[$head] + $expenses[$tail];

                if ($sum === $sumToFind) {
                    return [
                        intval($expenses[$i]),
                        intval($expenses[$head]),
                        intval($expenses[$tail]),
                    ];
                }

                if ($sum < $sumToFind) {
                    $head++;
                }

                if ($sum > $sumToFind) {
                    $tail--;
                }
            }
        }

        return [];
    }
}
