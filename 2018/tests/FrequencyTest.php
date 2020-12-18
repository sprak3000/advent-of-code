<?php

namespace adventofcode\Year2018\Test;

use adventofcode\Year2018\Frequency;
use PHPUnit\Framework\TestCase;

class FrequencyTest extends TestCase
{
    protected $frequency;

    protected function setup(): void
    {
        $this->frequency = new Frequency();
    }

    public function testApplyChanges()
    {
        // Day 1 Part 1 sample inputs
        $result = $this->frequency->applyChanges(0, explode(',', '+1,-2,+3,+1'));
        $this->assertSame(3, $result);

        $result = $this->frequency->applyChanges(0, explode(',', '+1,+1,+1'));
        $this->assertSame(3, $result);

        $result = $this->frequency->applyChanges(0, explode(',', '+1,+1,-2'));
        $this->assertSame(0, $result);

        $result = $this->frequency->applyChanges(0, explode(',', '-1,-2,-3'));
        $this->assertSame(-6, $result);

        // Day 1 Part 1 puzzle input
        $changes = file(__DIR__ . '/../inputs/day-01.input', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        $result = $this->frequency->applyChanges(0, $changes);
        $this->assertSame(513, $result);
    }

    public function testFindFirstDuplicate()
    {
        // Day 1 Part 1 sample inputs
        $result = $this->frequency->findFirstDuplicate(0, explode(',', '+1,-2,+3,+1'));
        $this->assertSame(2, $result);

        $result = $this->frequency->findFirstDuplicate(0, explode(',', '+1,-1'));
        $this->assertSame(0, $result);

        $result = $this->frequency->findFirstDuplicate(0, explode(',', '+3,+3,+4,-2,-4'));
        $this->assertSame(10, $result);

        $result = $this->frequency->findFirstDuplicate(0, explode(',', '-6,+3,+8,+5,-6'));
        $this->assertSame(5, $result);

        $result = $this->frequency->findFirstDuplicate(0, explode(',', '+7,+7,-2,-7,-4'));
        $this->assertSame(14, $result);

        // Day 1 Part 1 puzzle input
        $changes = file(__DIR__ . '/../inputs/day-01.input', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        $result = $this->frequency->findFirstDuplicate(0, $changes);
        $this->assertSame(287, $result);
    }
}
