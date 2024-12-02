<?php

namespace adventofcode\Year2024\Test;

use adventofcode\Year2024\ShortestDistanceParser;
use PHPUnit\Framework\TestCase;

class ShortestDistanceParserTest extends TestCase
{
    protected ShortestDistanceParser $shortestDistanceParser;
    protected array|false $sampleValues;
    protected array|false $values;

    protected function setup(): void
    {
        $this->shortestDistanceParser = new ShortestDistanceParser();
        $this->sampleValues = file(__DIR__ . '/../inputs/day-01-sample.input', FILE_IGNORE_NEW_LINES);
        $this->values = file(__DIR__ . '/../inputs/day-01.input', FILE_IGNORE_NEW_LINES);
    }

    public function testFindShortestDistanceSum()
    {
        // Day 1 Part 1 example inputs
        $result = $this->shortestDistanceParser->findShortestDistanceSum($this->sampleValues);
        $this->assertEquals(11, $result);

        // Day 1 Part 1 puzzle inputs
        $result = $this->shortestDistanceParser->findShortestDistanceSum($this->values);
        $this->assertEquals(3508942, $result);
    }

    public function testFindSimilarityScoreSum()
    {
        // Day 1 Part 2 example inputs
        $result = $this->shortestDistanceParser->findSimilarityScoreSum($this->sampleValues);
        $this->assertEquals(31, $result);

        // Day 1 Part 2 puzzle inputs
        $result = $this->shortestDistanceParser->findSimilarityScoreSum($this->values);
        $this->assertEquals(26593248, $result);
    }
}
