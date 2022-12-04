<?php

namespace adventofcode\Year2022\Test;

use adventofcode\Year2022\CleaningAssignment;
use PHPUnit\Framework\TestCase;

class CleaningAssignmentTest extends TestCase
{
    protected CleaningAssignment $cleaningAssignment;
    protected array|false $sampleAssignments;
    protected array|false $assignments;

    protected function setup(): void
    {
        $this->cleaningAssignment = new CleaningAssignment();
        $this->sampleAssignments = file(__DIR__ . '/../inputs/day-04-sample.input', FILE_IGNORE_NEW_LINES);
        $this->assignments = file(__DIR__ . '/../inputs/day-04.input', FILE_IGNORE_NEW_LINES);
    }

    public function testFindCompleteOverlaps()
    {
        // Day 4 Part 1 example inputs
        $result = $this->cleaningAssignment->findCompleteOverlaps($this->sampleAssignments);
        $this->assertEquals(2, $result);

        // Day 4 Part 1 puzzle inputs
        $result = $this->cleaningAssignment->findCompleteOverlaps($this->assignments);
        $this->assertEquals(530, $result);
    }

    public function testFindAnyOverlaps()
    {
        // Day 4 Part 2 example inputs
        $result = $this->cleaningAssignment->findAnyOverlaps($this->sampleAssignments);
        $this->assertEquals(4, $result);

        // Day 4 Part 2 puzzle inputs
        $result = $this->cleaningAssignment->findAnyOverlaps($this->assignments);
        $this->assertEquals(903, $result);
    }
}
