<?php

namespace adventofcode\Year2018\Test;

use adventofcode\Year2018\Fabric;
use PHPUnit\Framework\TestCase;

class FabricTest extends TestCase
{
    protected $fabric;

    protected function setup(): void
    {
        $this->fabric = new Fabric();
    }

    public function testOverlaps()
    {
        // Day 3 Part 1 puzzle input
        $claims = file(__DIR__ . '/../inputs/day-03.input', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        $overlaps = $this->fabric->overlaps($claims);
        $this->assertSame(97218, $overlaps);
    }

    public function testMatchingLetters()
    {
        // Day 3 Part 2 puzzle input
        $claims = file(__DIR__ . '/../inputs/day-03.input', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        $claimID = $this->fabric->doesNotOverlap($claims);
        $this->assertSame(717, $claimID);
    }
}
