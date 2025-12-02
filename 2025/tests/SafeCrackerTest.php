<?php

namespace adventofcode\Year2025\Test;

use adventofcode\Year2025\SafeCracker;
use PHPUnit\Framework\TestCase;

class SafeCrackerTest extends TestCase
{
    protected SafeCracker $safeCracker;
    protected array|false $sampleLines;
    protected array|false $lines;

    protected function setup(): void
    {
        $this->safeCracker = new SafeCracker();
        $this->sampleLines = file(__DIR__ . '/../inputs/day-01-sample.input', FILE_IGNORE_NEW_LINES);
        $this->lines = file(__DIR__ . '/../inputs/day-01.input', FILE_IGNORE_NEW_LINES);
    }

    public function testFindPointedAtZerosFromInstructions()
    {
        // Day 1 Part 1 example inputs
        $result = $this->safeCracker->findPointedAtZerosFromInstructions($this->sampleLines);
        $this->assertEquals(3, $result);

        // Day 1 Part 1 puzzle inputs
        $result = $this->safeCracker->findPointedAtZerosFromInstructions($this->lines);
        $this->assertEquals(1150, $result);
    }

    public function testFindZerosHitFromInstructions()
    {
        // Day 1 Part 2 example inputs
        $result = $this->safeCracker->findZerosHitFromInstructions(['R1000']);
        $this->assertEquals(10, $result);

        $result = $this->safeCracker->findZerosHitFromInstructions($this->sampleLines);
        $this->assertEquals(6, $result);

        // Day 1 Part 2 puzzle inputs
        $result = $this->safeCracker->findZerosHitFromInstructions($this->lines);
        $this->assertEquals(6738, $result);
    }
}
