<?php

namespace adventofcode\Year2024\Test;

use adventofcode\Year2024\ReactorReportParser;
use PHPUnit\Framework\TestCase;

class ReactorReportParserTest extends TestCase
{
    protected ReactorReportParser $reactorReportParser;
    protected array|false $sampleReports;
    protected array|false $reports;

    protected function setup(): void
    {
        $this->reactorReportParser = new ReactorReportParser();
        $this->sampleReports = file(__DIR__ . '/../inputs/day-02-sample.input', FILE_IGNORE_NEW_LINES);
        $this->reports = file(__DIR__ . '/../inputs/day-02.input', FILE_IGNORE_NEW_LINES);
    }

    public function testFindSafeReportsCount()
    {
        // Day 2 Part 1 example inputs
        $result = $this->reactorReportParser->findSafeReportsCount($this->sampleReports);
        $this->assertEquals(2, $result);

        // Day 2 Part 1 puzzle inputs
        $result = $this->reactorReportParser->findSafeReportsCount($this->reports);
        $this->assertEquals(660, $result);
    }

    public function testFindSafeReportsCountUsingProblemDampener()
    {
        $this->markTestSkipped('TODO...');

        // Day 2 Part 2 example inputs
        $result = $this->reactorReportParser->findSafeReportsCount($this->sampleReports, true);
        $this->assertEquals(4, $result);

        // Day 2 Part 2 puzzle inputs
        // 685 is too low
        $result = $this->reactorReportParser->findSafeReportsCount($this->reports, true);
        $this->assertEquals(660, $result);
    }
}
