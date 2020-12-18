<?php

namespace adventofcode\Year2018\Test;

use adventofcode\Year2018\DutyLog;
use PHPUnit\Framework\TestCase;

class DutyLogTest extends TestCase
{
    protected $dutyLog;

    protected function setup(): void
    {
        $this->dutyLog = new DutyLog();
    }

    public function testWhoSleepsTheMost()
    {
        // Day 4 Part 1 puzzle input
        $logs = file(__DIR__ . '/../inputs/day-04.input', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        $data = $this->dutyLog->whoSleepsTheMost($logs);
        $this->assertSame(19025, $data['ID'] * $data['bestMinute']);
    }

    public function testMatchingLetters()
    {
        // Day 4 Part 2 puzzle input
        $logs = file(__DIR__ . '/../inputs/day-04.input', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        $data = $this->dutyLog->whoSleepsTheMostOnTheSameMinute($logs);
        $this->assertSame(23776, $data['ID'] * $data['bestMinute']);
    }
}
