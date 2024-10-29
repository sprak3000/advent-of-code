<?php

namespace adventofcode\Year2015\Test;

use adventofcode\Year2015\StringParser;
use PHPUnit\Framework\TestCase;

class StringParserTest extends TestCase
{
    protected $stringParser;
    protected $sampleInput;
    protected $input;

    protected function setup(): void
    {
        $this->stringParser = new StringParser();
        $this->sampleInput = file(__DIR__ . '/../inputs/day-08-sample.input', FILE_IGNORE_NEW_LINES);
        $this->input = file(__DIR__ . '/../inputs/day-08.input', FILE_IGNORE_NEW_LINES);
    }

    public function testComputeStringUsage()
    {
        // Day 8 Part 1 example inputs
        $result = $this->stringParser->computeStringUsage($this->sampleInput);
        $this->assertEquals(12, $result['charactersOfStringCode'] - $result['charactersInMemory']);

        // Day 8 Part 1 inputs
        $result = $this->stringParser->computeStringUsage($this->input);
        $this->assertEquals(1371, $result['charactersOfStringCode'] - $result['charactersInMemory']);
    }

    public function testComputeEncodedStringUsage()
    {
        // Day 8 Part 2 example inputs
        $result = $this->stringParser->computeEncodedStringUsage($this->sampleInput);
        print_r($result);
        $this->assertEquals(19, $result['charactersOfEncodedStrings'] - $result['charactersOfStringCode']);

        // Day 8 Part 2 inputs
        $result = $this->stringParser->computeEncodedStringUsage($this->input);
        // 1998 is too low, 2093 is too high?, 2118 is not right, 2384 is too high, 2086 also wrong, 2117???
        $this->assertEquals(2117, $result['charactersOfEncodedStrings'] - $result['charactersOfStringCode']);
    }
}
