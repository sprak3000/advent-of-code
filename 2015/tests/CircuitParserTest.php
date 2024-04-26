<?php

namespace adventofcode\Year2015\Test;

use adventofcode\Year2015\CircuitParser;
use PHPUnit\Framework\TestCase;

class CircuitParserTest extends TestCase
{
    protected $circuitParser;

    protected function setup(): void
    {
        $this->circuitParser = new CircuitParser();
    }

    public function testParse()
    {
        // Day 7 Part 1 example input
        $sampleInput = file(__DIR__ . '/../inputs/day-07.sample.input', FILE_IGNORE_NEW_LINES);
        $wires = $this->circuitParser->parse($sampleInput);
        $expectedSampleWires = [
          'd' => 72,
          'e' => 507,
          'f' => 492,
          'g' => 114,
          'h' => 65412,
          'i' => 65079,
          'x' => 123,
          'y' => 456,
        ];
        $this->assertEquals($expectedSampleWires, $wires);

        // Day 7 Part 1 puzzle input
        $input = file(__DIR__ . '/../inputs/day-07.input', FILE_IGNORE_NEW_LINES);
        $wires = $this->circuitParser->parse($input);
        print_r($wires);
    }
}
