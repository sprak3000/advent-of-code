<?php

namespace adventofcode\Year2022\Test;

use adventofcode\Year2022\Rucksack;
use PHPUnit\Framework\TestCase;

class RucksackTest extends TestCase
{
    protected Rucksack $rucksack;
    protected $sampleSacks;
    protected $sacks;

    protected function setup(): void
    {
        $this->rucksack = new Rucksack();
        $this->sampleSacks = file(__DIR__ . '/../inputs/day-03-sample.input', FILE_IGNORE_NEW_LINES);
        $this->sacks = file(__DIR__ . '/../inputs/day-03.input', FILE_IGNORE_NEW_LINES);
    }

    public function testFindDuplicatePriorityTotal()
    {
        // Day 3 Part 1 example inputs
        $result = $this->rucksack->findDuplicatePriorityTotal($this->sampleSacks);
        $this->assertEquals(157, $result);

        // Day 3 Part 1 puzzle inputs
        $result = $this->rucksack->findDuplicatePriorityTotal($this->sacks);
        $this->assertEquals(8053, $result);
    }

    public function testFindBadgePriorityTotal()
    {
        // Day 3 Part 1 example inputs
        $result = $this->rucksack->findBadgePriorityTotal($this->sampleSacks);
        $this->assertEquals(70, $result);

        // Day 3 Part 1 puzzle inputs
        $result = $this->rucksack->findBadgePriorityTotal($this->sacks);
        $this->assertEquals(2425, $result);
    }
}
