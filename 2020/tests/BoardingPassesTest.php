<?php

namespace adventofcode\Year2020\Test;

use adventofcode\Year2020\BoardingPasses;
use PHPUnit\Framework\TestCase;

class BoardingPassesTest extends TestCase
{
    protected $boardingPasses;

    protected function setup(): void
    {
        $this->boardingPasses = new BoardingPasses();
    }

    public function testComputeSeatData()
    {
        // Day 5 Part 1 example inputs
        $passes = [
            [
                'pass' => 'FBFBBFFRLR',
                'expectedResult' => [
                    'row' => 44,
                    'column' => 5,
                    'id' => 357,
                ],
            ],
            [
                'pass' => 'BFFFBBFRRR',
                'expectedResult' => [
                    'row' => 70,
                    'column' => 7,
                    'id' => 567,
                ],
            ],
            [
                'pass' => 'FFFBBBFRRR',
                'expectedResult' => [
                    'row' => 14,
                    'column' => 7,
                    'id' => 119,
                ],
            ],
            [
                'pass' => 'BBFFBBFRLL',
                'expectedResult' => [
                    'row' => 102,
                    'column' => 4,
                    'id' => 820,
                ],
            ],
        ];

        foreach ($passes as $pass) {
            $data = $this->boardingPasses->computeSeatData($pass['pass']);
            $this->assertSame($pass['expectedResult'], $data);
        }
    }

    public function testFindHighestSeatID()
    {
        // Day 5 Part 1 example inputs
        $passes = [
            'FBFBBFFRLR',
            'BFFFBBFRRR',
            'FFFBBBFRRR',
            'BBFFBBFRLL',
        ];

        $id = $this->boardingPasses->findHighestSeatID($passes);

        $this->assertSame(820, $id);

        // Day 5 Part 1 puzzle inputs
        $passes = file(__DIR__ . '/../inputs/day-05.input', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        $id = $this->boardingPasses->findHighestSeatID($passes);

        $this->assertSame(906, $id);
    }
}
