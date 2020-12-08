<?php

namespace adventofcode\Year2020\Test;

use adventofcode\Year2020\Trajectory;
use PHPUnit\Framework\TestCase;

class TrajectoryTest extends TestCase
{
    protected $trajectory;

    protected function setup(): void
    {
        $this->trajectory = new Trajectory();
    }

    public function testCountTreesInPath()
    {
        // Day 3 Part 1 & 2 example inputs
        $mapLines = [
            '..##.......',
            '#...#...#..',
            '.#....#..#.',
            '..#.#...#.#',
            '.#...##..#.',
            '..#.##.....',
            '.#.#.#....#',
            '.#........#',
            '#.##...#...',
            '#...##....#',
            '.#..#...#.#',
        ];

        $map = $this->trajectory->generateMap($mapLines);

        $treesFor3x1 = $this->trajectory->countTreesInPath(3, 1, $map);
        $this->assertEquals(7, $treesFor3x1);

        $treesFor1x1 = $this->trajectory->countTreesInPath(1, 1, $map);
        $this->assertEquals(2, $treesFor1x1);

        $treesFor5x1 = $this->trajectory->countTreesInPath(5, 1, $map);
        $this->assertEquals(3, $treesFor5x1);

        $treesFor7x1 = $this->trajectory->countTreesInPath(7, 1, $map);
        $this->assertEquals(4, $treesFor7x1);

        $treesFor1x2 = $this->trajectory->countTreesInPath(1, 2, $map);
        $this->assertEquals(2, $treesFor1x2);

        // Day 3 Part 1 & 2 puzzle inputs
        $mapLines = file(__DIR__ . '/../inputs/day-03.input', FILE_IGNORE_NEW_LINES);
        $map = $this->trajectory->generateMap($mapLines);

        $treesFor3x1 = $this->trajectory->countTreesInPath(3, 1, $map);
        $this->assertEquals(252, $treesFor3x1);

        $treesFor1x1 = $this->trajectory->countTreesInPath(1, 1, $map);
        $this->assertEquals(57, $treesFor1x1);

        $treesFor5x1 = $this->trajectory->countTreesInPath(5, 1, $map);
        $this->assertEquals(64, $treesFor5x1);

        $treesFor7x1 = $this->trajectory->countTreesInPath(7, 1, $map);
        $this->assertEquals(66, $treesFor7x1);

        $treesFor1x2 = $this->trajectory->countTreesInPath(1, 2, $map);
        $this->assertEquals(43, $treesFor1x2);
    }
}
