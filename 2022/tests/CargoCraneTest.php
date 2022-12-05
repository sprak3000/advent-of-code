<?php

namespace adventofcode\Year2022\Test;

use adventofcode\Year2022\CargoCrane;
use PHPUnit\Framework\TestCase;

class CargoCraneTest extends TestCase
{
    protected CargoCrane $crane;
    protected string $sampleInstructions;
    protected string $instructions;

    protected array $sampleCrates =  [
        ['N', 'Z'],
        ['D', 'C', 'M'],
        ['P'],
    ];

    protected array $crates = [
        ['W', 'T', 'H', 'P', 'J', 'C', 'F'],
        ['H', 'B', 'J', 'Z', 'F', 'V', 'R', 'G'],
        ['R', 'T', 'P', 'H'],
        ['T', 'H', 'P', 'N', 'S', 'Z'],
        ['D', 'C', 'J', 'H', 'Z', 'F', 'V', 'N'],
        ['Z', 'D', 'W', 'F', 'G', 'M', 'P'],
        ['P', 'D', 'J', 'S', 'W', 'Z', 'V', 'M'],
        ['S', 'D', 'N'],
        ['M', 'F', 'S', 'Z', 'D'],
    ];

    protected function setup(): void
    {
        $this->crane = new CargoCrane();
        $this->sampleInstructions = __DIR__ . '/../inputs/day-05-sample.input';
        $this->instructions = __DIR__ . '/../inputs/day-05.input';
    }

    public function testFindTopCratesUsingSingleMove()
    {
        // Day 5 Part 1 example inputs
        $result = $this->crane->findTopCrates($this->sampleInstructions, $this->sampleCrates, 5, true);
        $this->assertEquals('CMZ', $result);

        // Day 5 Part 1 puzzle inputs
        $result = $this->crane->findTopCrates($this->instructions, $this->crates, 10, true);
        $this->assertEquals('SPFMVDTZT', $result);
    }

    public function testFindTopCratesUsingMultiMove()
    {
        // Day 5 Part 2 example inputs
        $result = $this->crane->findTopCrates($this->sampleInstructions, $this->sampleCrates, 5);
        $this->assertEquals('MCD', $result);

        // Day 5 Part 2 puzzle inputs
        $result = $this->crane->findTopCrates($this->instructions, $this->crates, 10);
        $this->assertEquals('ZFSJBPRFP', $result);
    }
}
