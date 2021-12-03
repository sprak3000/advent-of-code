<?php

namespace adventofcode\Year2021\Test;

use adventofcode\Year2021\Navigation;
use PHPUnit\Framework\TestCase;

class NavigationTest extends TestCase
{
    protected $navigation;
    protected $sampleDirections;
    protected $directions;

    protected function setup(): void
    {
        $this->navigation = new Navigation();
        $this->sampleDirections = file(__DIR__ . '/../inputs/day-02-sample.input', FILE_IGNORE_NEW_LINES);
        $this->directions = file(__DIR__ . '/../inputs/day-02.input', FILE_IGNORE_NEW_LINES);
    }

    public function testFindPosition()
    {
        // Day 2 Part 1 example inputs
        $result = $this->navigation->findPosition($this->sampleDirections);
        $this->assertEquals(['horizontal' => 15, 'depth' => 10], $result);
        $this->assertEquals(150, $result['horizontal'] * $result['depth']);

        // Day 2 Part 1 puzzle inputs
        $result = $this->navigation->findPosition($this->directions);
        $this->assertEquals(['horizontal' => 1971, 'depth' => 830], $result);
        $this->assertEquals(1635930, $result['horizontal'] * $result['depth']);
    }

    public function testFindPositionByAim()
    {
        // Day 2 Part 2 example inputs
        $result = $this->navigation->findPositionByAim($this->sampleDirections);
        $this->assertEquals(['horizontal' => 15, 'depth' => 60], $result);
        $this->assertEquals(900, $result['horizontal'] * $result['depth']);

        // Day 2 Part 2 puzzle inputs
        $result = $this->navigation->findPositionByAim($this->directions);
        $this->assertEquals(['horizontal' => 1971, 'depth' => 904018], $result);
        $this->assertEquals(1781819478, $result['horizontal'] * $result['depth']);
    }
}
