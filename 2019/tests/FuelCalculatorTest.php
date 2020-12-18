<?php

namespace adventofcode\Year2019\Test;

use adventofcode\Year2019\FuelCalculator;
use PHPUnit\Framework\TestCase;

class FuelCalculatorTest extends TestCase
{
    protected $fuelCalculator;

    protected function setup(): void
    {
        $this->fuelCalculator = new FuelCalculator();
    }

    public function testTotalUsage()
    {
        // Day 1 Part 1 & 2 sample inputs
        $masses = [
            12,
            14,
            1969,
            100756,
        ];

        $fuel = $this->fuelCalculator->totalUsage($masses);
        $this->assertSame($fuel['total'], 34241);

        $masses = [
            14,
            1969,
            100756,
        ];

        $fuel = $this->fuelCalculator->totalUsage($masses);
        $this->assertSame($fuel['additional'], 17075);

        // Day 1 puzzle input
        $masses = file(__DIR__ . '/../inputs/day-01.input', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

        $fuel = $this->fuelCalculator->totalUsage($masses);
        $this->assertSame(3256114, $fuel['total']);
        $this->assertSame(4881302, $fuel['total'] + $fuel['additional']);
    }
}
