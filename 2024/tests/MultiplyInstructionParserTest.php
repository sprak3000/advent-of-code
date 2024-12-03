<?php

namespace adventofcode\Year2024\Test;

use adventofcode\Year2024\MultiplyInstructionParser;
use PHPUnit\Framework\TestCase;

class MultiplyInstructionParserTest extends TestCase
{
    protected MultiplyInstructionParser $multiplyInstructionParser;
    protected array|false $sampleLines;
    protected array|false $extendedSampleLines;
    protected array|false $lines;

    protected function setup(): void
    {
        $this->multiplyInstructionParser = new MultiplyInstructionParser();
        $this->sampleLines = file(__DIR__ . '/../inputs/day-03-sample.input', FILE_IGNORE_NEW_LINES);
        $this->extendedSampleLines = file(__DIR__ . '/../inputs/day-03-sample-part-2.input', FILE_IGNORE_NEW_LINES);
        $this->lines = file(__DIR__ . '/../inputs/day-03.input', FILE_IGNORE_NEW_LINES);
    }

    public function testFindMultiplyInstructionSum()
    {
        // Day 3 Part 1 example inputs
        $result = $this->multiplyInstructionParser->findMultiplyInstructionSum($this->sampleLines);
        $this->assertEquals(161, $result);

        // Day 3 Part 1 puzzle inputs
        $result = $this->multiplyInstructionParser->findMultiplyInstructionSum($this->lines);
        $this->assertEquals(157621318, $result);
    }

    public function testFindExtendedMultiplyInstructionSum()
    {
        // Day 3 Part 2 example inputs
        $result = $this->multiplyInstructionParser->findExtendedMultiplyInstructionSum($this->extendedSampleLines);
        $this->assertEquals(48, $result);

        // Day 3 Part 2 puzzle inputs
        $result = $this->multiplyInstructionParser->findExtendedMultiplyInstructionSum($this->lines);
        $this->assertEquals(79845780, $result);
    }
}
