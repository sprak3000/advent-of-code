<?php

namespace adventofcode\Year2023\Test;

use adventofcode\Year2023\GameResultParser;
use PHPUnit\Framework\TestCase;

class GameResultParserTest extends TestCase
{
    protected GameResultParser $gameResultParser;
    protected array|false $sampleGameData;
    protected array|false $gameData;

    protected function setup(): void
    {
        $this->gameResultParser = new GameResultParser();
        $this->sampleGameData = file(__DIR__ . '/../inputs/day-02-sample.input', FILE_IGNORE_NEW_LINES);
        $this->gameData = file(__DIR__ . '/../inputs/day-02.input', FILE_IGNORE_NEW_LINES);
    }

    public function testFindPossibleGameIDsSum()
    {
        // Day 2 Part 1 & 2 example inputs
        $result = $this->gameResultParser->parseGameData($this->sampleGameData, 12, 13, 14);
        $this->assertEquals(8, $result['possibleGameIDsSum']);
        $this->assertEquals(2286, $result['minimumPowerSum']);

        // Day 2 Part 1 & 2 puzzle inputs
        $result = $this->gameResultParser->parseGameData($this->gameData, 12, 13, 14);
        $this->assertEquals(2545, $result['possibleGameIDsSum']);
        $this->assertEquals(78111, $result['minimumPowerSum']);
    }
}
