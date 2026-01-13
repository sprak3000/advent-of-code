<?php

namespace adventofcode\Year2025\Test;

use adventofcode\Year2025\Joltage;
use PHPUnit\Framework\TestCase;

class JoltageTest extends TestCase
{
    protected Joltage $joltage;
    protected array|false $sampleLines;
    protected array|false $lines;

    protected function setup(): void
    {
        $this->joltage = new Joltage();
        $this->sampleLines = file(__DIR__ . '/../inputs/day-03-sample.input', FILE_IGNORE_NEW_LINES);
        $this->lines = file(__DIR__ . '/../inputs/day-03.input', FILE_IGNORE_NEW_LINES);
    }

    public function testFindPointedAtZerosFromInstructions()
    {
        // Day 3 Part 1 example inputs
        $result = $this->joltage->findMaximumJoltage($this->sampleLines);
        $this->assertEquals(357, $result);

        // Day 3 Part 1 puzzle inputs
        $result = $this->joltage->findMaximumJoltage($this->lines);
        $this->assertEquals(17346, $result);
    }
}
