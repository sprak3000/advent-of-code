<?php

namespace adventofcode\Year2020\Test;

use Exception;
use adventofcode\Year2020\Luggage;
use PHPUnit\Framework\TestCase;

class LuggageTest extends TestCase
{
    protected $luggage;

    protected function setup(): void
    {
        $this->luggage = new Luggage();
    }

    public function testCanContainBagType()
    {
        // Day 7 sample input
        $rules = [
            'light red bags contain 1 bright white bag, 2 muted yellow bags.',
            'dark orange bags contain 3 bright white bags, 4 muted yellow bags.',
            'bright white bags contain 1 shiny gold bag.',
            'muted yellow bags contain 2 shiny gold bags, 9 faded blue bags.',
            'shiny gold bags contain 1 dark olive bag, 2 vibrant plum bags.',
            'dark olive bags contain 3 faded blue bags, 4 dotted black bags.',
            'vibrant plum bags contain 5 faded blue bags, 6 dotted black bags.',
            'faded blue bags contain no other bags.',
            'dotted black bags contain no other bags.',
        ];

        $bagType = 'shiny gold bag';

        $bags = $this->luggage->canContainBagType($rules, $bagType);
        $this->assertSame(4, $bags);

        // Day 7 puzzle input
        $rules = file(__DIR__ . '/../inputs/day-07.input', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $bags = $this->luggage->canContainBagType($rules, $bagType);
        $this->assertSame(4, $bags);
    }
}
