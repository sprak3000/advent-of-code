<?php

namespace adventofcode\Year2022\Test;

use adventofcode\Year2022\RockPaperScissor;
use PHPUnit\Framework\TestCase;

class RockPaperScissorTest extends TestCase
{
    protected RockPaperScissor $rockPaperScissor;
    protected array|false $sampleStrategy;
    protected array|false $strategy;

    protected function setup(): void
    {
        $this->rockPaperScissor = new RockPaperScissor();
        $this->sampleStrategy = file(__DIR__ . '/../inputs/day-02-sample.input', FILE_IGNORE_NEW_LINES);
        $this->strategy = file(__DIR__ . '/../inputs/day-02.input', FILE_IGNORE_NEW_LINES);
    }

    public function testFindTotalScoreWrongAssumption()
    {
        // Day 2 Part 1 example inputs
        $result = $this->rockPaperScissor->findTotalScoreWrongAssumption($this->sampleStrategy);
        $this->assertEquals(15, $result);

        // Day 2 Part 1 puzzle inputs
        $result = $this->rockPaperScissor->findTotalScoreWrongAssumption($this->strategy);
        $this->assertEquals(11063, $result);
    }

    public function testFindTotalScore()
    {
        // Day 2 Part 2 example inputs
        $result = $this->rockPaperScissor->findTotalScore($this->sampleStrategy);
        $this->assertEquals(12, $result);

        // Day 2 Part 2 puzzle inputs
        $result = $this->rockPaperScissor->findTotalScore($this->strategy);
        $this->assertEquals(10349, $result);
    }
}
