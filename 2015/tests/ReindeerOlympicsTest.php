<?php

namespace adventofcode\Year2015\Test;

use adventofcode\Year2015\ReindeerOlympics;
use PHPUnit\Framework\TestCase;

class ReindeerOlympicsTest extends TestCase
{
    protected ReindeerOlympics $reindeerOlympics;
    protected array $sampleInput;
    protected array $input;

    protected function setup(): void
    {
        $this->reindeerOlympics = new ReindeerOlympics();
        $this->sampleInput = file(__DIR__ . '/../inputs/day-14-sample.input', FILE_IGNORE_NEW_LINES);
        $this->input = file(__DIR__ . '/../inputs/day-14.input', FILE_IGNORE_NEW_LINES);
    }

    public function testDetermineFlightWinnerDistance()
    {
        // Day 14 sample input
        $result = $this->reindeerOlympics->determineFlightWinnerDistance($this->sampleInput, 1000);
        $this->assertEquals(1120, $result);

        // Day 14 input
        $result = $this->reindeerOlympics->determineFlightWinnerDistance($this->input, 2503);
        $this->assertEquals(2660, $result);
    }

    public function testDetermineFlightWinnerPoints()
    {
        // Day 14 sample input
        $result = $this->reindeerOlympics->determineFlightWinnerPoints($this->sampleInput, 1000);
        $this->assertEquals(689, $result);

        // Day 14 input
        $result = $this->reindeerOlympics->determineFlightWinnerPoints($this->input, 2503);
        $this->assertEquals(1256, $result);
    }
}
