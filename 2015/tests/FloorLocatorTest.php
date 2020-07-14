<?php

namespace adventofcode\Year2015\Test;

use adventofcode\Year2015\FloorLocator;
use PHPUnit\Framework\TestCase;

class FloorLocatorTest extends TestCase
{
    protected $floorLocator;

    protected function setup(): void
    {
        $this->floorLocator = new FloorLocator();
    }

    public function testWhereAmI()
    {
        // Day 1 Part 1 example inputs
        $this->assertSame(0, $this->floorLocator->whereAmI('(())'));
        $this->assertSame(0, $this->floorLocator->whereAmI('()()'));
        $this->assertSame(3, $this->floorLocator->whereAmI('((('));
        $this->assertSame(3, $this->floorLocator->whereAmI('))((((('));
        $this->assertSame(-1, $this->floorLocator->whereAmI('())'));
        $this->assertSame(-1, $this->floorLocator->whereAmI('))('));
        $this->assertSame(-3, $this->floorLocator->whereAmI(')))'));
        $this->assertSame(-3, $this->floorLocator->whereAmI(')())())'));

        // Day 1 puzzle input
        $input = file_get_contents(__DIR__ . '/../inputs/day-01.input');
        $this->assertSame(280, $this->floorLocator->whereAmI($input));
    }

    public function testWhenDoIReachTheBasement()
    {
        // Day 1 Part 2 example inputs
        $this->assertSame(1, $this->floorLocator->whenDoIReachTheBasement(')'));
        $this->assertSame(5, $this->floorLocator->whenDoIReachTheBasement('()())'));

        // Day 1 puzzle input
        $input = file_get_contents(__DIR__ . '/../inputs/day-01.input');
        $this->assertSame(1797, $this->floorLocator->whenDoIReachTheBasement($input));
    }
}
