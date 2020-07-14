<?php

namespace adventofcode\Year2015\Test;

use adventofcode\Year2015\PresentDelivery;
use PHPUnit\Framework\TestCase;

class PresentDeliveryTest extends TestCase
{
    protected $presentDelivery;

    protected function setup(): void
    {
        $this->presentDelivery = new PresentDelivery();
    }

    public function testMakeDeliveries()
    {
        // Day 3 Part 1 example inputs
        $this->assertSame(2, count($this->presentDelivery->makeDeliveries('>')));
        $this->assertSame(4, count($this->presentDelivery->makeDeliveries('^>v<')));
        $this->assertSame(2, count($this->presentDelivery->makeDeliveries('^v^v^v^v^v')));

        // Day 3 puzzle input
        $input = file_get_contents(__DIR__ . '/../inputs/day-03.input');
        $this->assertSame(2081, count($this->presentDelivery->makeDeliveries($input)));
    }

    public function testMakeRoboDeliveries()
    {
        // Day 3 Part 1 example inputs
        $this->assertSame(3, count($this->presentDelivery->makeRoboDeliveries('^v')));
        $this->assertSame(3, count($this->presentDelivery->makeRoboDeliveries('^>v<')));
        $this->assertSame(11, count($this->presentDelivery->makeRoboDeliveries('^v^v^v^v^v')));

        // Day 3 puzzle input
        $input = file_get_contents(__DIR__ . '/../inputs/day-03.input');
        $this->assertSame(2341, count($this->presentDelivery->makeRoboDeliveries($input)));
    }
}
