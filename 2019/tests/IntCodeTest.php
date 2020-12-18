<?php

namespace adventofcode\Year2019\Test;

use adventofcode\Year2019\IntCode;
use PHPUnit\Framework\TestCase;

class IntCodeTest extends TestCase
{
    protected $intCode;

    protected function setup(): void
    {
        $this->intCode = new IntCode();
    }

    public function testRun()
    {
        // Day 2 Part 1 sample inputs
        $result = $this->intCode->run(explode(',', '1,9,10,3,2,3,11,0,99,30,40,50'));
        $this->assertSame(3500, $result);

        $result = $this->intCode->run(explode(',', '2,3,0,3,99'));
        $this->assertSame(2, $result);

        $result = $this->intCode->run(explode(',', '2,4,4,5,99,0'));
        $this->assertSame(2, $result);

        $result = $this->intCode->run(explode(',', '1,1,1,4,99,5,6,0,99'));
        $this->assertSame(30, $result);

        // Day 2 Part 1 puzzle input
        $program = file_get_contents(__DIR__ . '/../inputs/day-02.input');
        $replacements = [
            [
                'index' => 1,
                'value' => 12,
            ],
            [
                'index' => 2,
                'value' => 2,
            ],
        ];
        $result = $this->intCode->run(explode(',', $program), $replacements);
        $this->assertSame(4090689, $result);
    }
}
