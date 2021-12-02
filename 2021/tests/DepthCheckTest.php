<?php

namespace adventofcode\Year2021\Test;

use adventofcode\Year2021\DepthCheck;
use PHPUnit\Framework\TestCase;

class DepthCheckTest extends TestCase
{
    protected $depthCheck;
    protected $sampleDepths;
    protected $depths;

    protected function setup(): void
    {
        $this->depthCheck = new DepthCheck();
        $this->sampleDepths = file(__DIR__ . '/../inputs/day-01-sample.input', FILE_IGNORE_NEW_LINES);
        $this->depths = file(__DIR__ . '/../inputs/day-01.input', FILE_IGNORE_NEW_LINES);
    }

    public function testFindDepthIncreases()
    {
        // Day 1 Part 1 example inputs
        $result = $this->depthCheck->findDepthIncreases($this->sampleDepths);
        $this->assertEquals(7, $result);

        // Day 1 Part 1 puzzle inputs
        $result = $this->depthCheck->findDepthIncreases($this->depths);
        $this->assertEquals(1553, $result);
    }

    public function testFindDepthIncreasesBySlidingWindow()
    {
        // Day 1 Part 2 example inputs
        $result = $this->depthCheck->findDepthIncreasesBySlidingWindow($this->sampleDepths);
        $this->assertEquals(5, $result);

        // Day 1 Part 2 puzzle inputs
        $result = $this->depthCheck->findDepthIncreasesBySlidingWindow($this->depths);
        $this->assertEquals(1597, $result);
    }
}
