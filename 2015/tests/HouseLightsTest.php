<?php

namespace adventofcode\Year2015\Test;

use adventofcode\Year2015\HouseLights;
use PHPUnit\Framework\TestCase;

class HouseLightsTest extends TestCase
{
    protected $houseLights;

    protected function setup(): void
    {
        $this->houseLights = new HouseLights();
    }

    public function testFollowInstructions()
    {
        // Day 6 Part 1 example inputs
        $instructions = [
            'turn on 0,0 through 999,999',
            'toggle 0,0 through 999,0',
            'turn off 499,499 through 500,500',
        ];

        $this->houseLights->followInstructions($instructions);
        $this->assertSame(998996, $this->houseLights->lightsLit());

        // Day 6 puzzle input
        $this->houseLights->reset();

        $instructions = file(__DIR__ . '/../inputs/day-06.input');

        $this->houseLights->followInstructions($instructions);
        $this->assertSame(543903, $this->houseLights->lightsLit());
    }

    public function testFollowBrightnessInstructions()
    {
        // Day 6 Part 2 example inputs
        $instructions = [
            'turn on 0,0 through 0,0',
            'toggle 0,0 through 999,999',
        ];

        $this->houseLights->followBrightnessInstructions($instructions);
        $this->assertSame(2000001, $this->houseLights->totalBrightness());

        // Day 6 puzzle input
        $this->houseLights->reset();

        $instructions = file(__DIR__ . '/../inputs/day-06.input');

        $this->houseLights->followBrightnessInstructions($instructions);
        $this->assertSame(14687245, $this->houseLights->totalBrightness());
    }
}
