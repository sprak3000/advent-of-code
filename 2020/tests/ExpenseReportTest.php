<?php

namespace adventofcode\Year2020\Test;

use adventofcode\Year2020\ExpenseReport;
use PHPUnit\Framework\TestCase;

class ExpenseReportTest extends TestCase
{
    protected $expenseReport;

    protected function setup(): void
    {
        $this->expenseReport = new ExpenseReport();
    }

    public function testFindTwoThatSumsTo()
    {
        // Day 1 Part 1 example inputs
        $sumToFind = 2020;
        $expenses = [
            1721,
            979,
            366,
            299,
            675,
            1456,
        ];

        $result = $this->expenseReport->findTwoThatSumsTo($sumToFind, $expenses);

        $this->assertCount(2, $result);
        $this->assertContains(1721, $result);
        $this->assertContains(299, $result);

        // Day 1 Part 1 puzzle inputs
        $expenses = file(__DIR__ . '/../inputs/day-01.input', FILE_IGNORE_NEW_LINES);
        $result = $this->expenseReport->findTwoThatSumsTo($sumToFind, $expenses);

        $this->assertCount(2, $result);
        $this->assertContains(534, $result);
        $this->assertContains(1486, $result);
    }

    public function testFindThreeThatSumsTo()
    {
        // Day 1 Part 2 example inputs
        $sumToFind = 2020;
        $expenses = [
            1721,
            979,
            366,
            299,
            675,
            1456,
        ];

        $result = $this->expenseReport->findThreeThatSumsTo($sumToFind, $expenses);

        $this->assertCount(3, $result);
        $this->assertContains(979, $result);
        $this->assertContains(366, $result);
        $this->assertContains(675, $result);

        // Day 1 Part 2 puzzle inputs
        $expenses = file(__DIR__ . '/../inputs/day-01.input', FILE_IGNORE_NEW_LINES);
        $result = $this->expenseReport->findThreeThatSumsTo($sumToFind, $expenses);

        $this->assertCount(3, $result);
        $this->assertContains(71, $result);
        $this->assertContains(686, $result);
        $this->assertContains(1263, $result);
    }
}
