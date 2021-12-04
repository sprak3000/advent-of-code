<?php

namespace adventofcode\Year2021\Test;

use adventofcode\Year2021\Diagnostics;
use PHPUnit\Framework\TestCase;

class DiagnosticsTest extends TestCase
{
    protected $diagnostics;
    protected $sampleReadings;
    protected $readings;

    protected function setup(): void
    {
        $this->diagnostics = new Diagnostics();
        $this->samplePowerReadings = file(__DIR__ . '/../inputs/day-03-sample.input', FILE_IGNORE_NEW_LINES);
        $this->powerReadings = file(__DIR__ . '/../inputs/day-03.input', FILE_IGNORE_NEW_LINES);
    }

    public function testFindPowerConsumption()
    {
        // Day 3 Part 1 example inputs
        $result = $this->diagnostics->findPowerConsumption($this->samplePowerReadings);
        $this->assertEquals(9, $result['epsilon']);
        $this->assertEquals(22, $result['gamma']);
        $this->assertEquals(198, $result['epsilon'] * $result['gamma']);

        // Day 3 Part 1 puzzle inputs
        $result = $this->diagnostics->findPowerConsumption($this->powerReadings);
        $this->assertEquals(1519, $result['epsilon']);
        $this->assertEquals(2576, $result['gamma']);
        $this->assertEquals(3912944, $result['epsilon'] * $result['gamma']);
    }

    public function testFindLifeSupportRating()
    {
        // Day 3 Part 2 example inputs
        $result = $this->diagnostics->findLifeSupportRating($this->samplePowerReadings);
        $this->assertEquals(23, $result['oxygen generator']);
        $this->assertEquals(10, $result['co2 scrubber']);
        $this->assertEquals(230, $result['oxygen generator'] * $result['co2 scrubber']);

        // Day 3 Part 2 puzzle inputs
        $result = $this->diagnostics->findLifeSupportRating($this->powerReadings);
        $this->assertEquals(3597, $result['oxygen generator']);
        $this->assertEquals(1389, $result['co2 scrubber']);
        $this->assertEquals(4996233, $result['oxygen generator'] * $result['co2 scrubber']);
    }
}
