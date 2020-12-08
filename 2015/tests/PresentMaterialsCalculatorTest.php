<?php

namespace adventofcode\Year2015\Test;

use adventofcode\Year2015\PresentMaterialsCalculator;
use PHPUnit\Framework\TestCase;

class PresentMaterialsCalculatorTest extends TestCase
{
    protected $calculator;

    protected function setup(): void
    {
        $this->calculator = new PresentMaterialsCalculator();
    }

    public function testCalculator()
    {
        // Day 2 Part 1 & 2 example inputs
        $this->calculator->calculate(['2x3x4']);
        $this->assertSame(58, $this->calculator->getWrappingPaperSquareFeet());
        $this->assertSame(34, $this->calculator->getRibbonFeet());

        $this->calculator->calculate(['1x1x10']);
        $this->assertSame(43, $this->calculator->getWrappingPaperSquareFeet());
        $this->assertSame(14, $this->calculator->getRibbonFeet());

        // Day 2 puzzle input
        $input = file(__DIR__ . '/../inputs/day-02.input', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $this->calculator->calculate($input);
        $this->assertSame(1586300, $this->calculator->getWrappingPaperSquareFeet());
        $this->assertSame(3737498, $this->calculator->getRibbonFeet());
    }
}
