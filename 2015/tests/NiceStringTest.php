<?php

namespace adventofcode\Year2015\Test;

use adventofcode\Year2015\NiceString;
use PHPUnit\Framework\TestCase;

class NiceStringTest extends TestCase
{
    protected $niceString;

    protected function setup(): void
    {
        $this->niceString = new NiceString();
    }

    public function testIsNice()
    {
        // Day 5 Part 1 example inputs
        $this->assertTrue($this->niceString->isNice('ugknbfddgicrmopn'));
        $this->assertTrue($this->niceString->isNice('aaa'));
        $this->assertFalse($this->niceString->isNice('jchzalrnumimnmhp'));
        $this->assertFalse($this->niceString->isNice('haegwjzuvuyypxyu'));
        $this->assertFalse($this->niceString->isNice('dvszwmarrgswjxmb'));

        // Day 5 Part 2 example inputs
        $this->assertTrue($this->niceString->isNice('qjhvhtzxzqqjkmpb', NiceString::MODE_V2));
        $this->assertTrue($this->niceString->isNice('xxyxx', NiceString::MODE_V2));
        $this->assertFalse($this->niceString->isNice('uurcxstgmygtbstg', NiceString::MODE_V2));
        $this->assertFalse($this->niceString->isNice('ieodomkazucvgmuy', NiceString::MODE_V2));
    }

    public function testCheckStrings()
    {
        // Day 5 puzzle input
        $input = file(__DIR__ . '/../inputs/day-05.input');

        // Original (Part 1) check
        $this->assertSame(238, count($this->niceString->checkStrings($input)['nice']));

        // Original (Part 2) check
        $this->assertSame(69, count($this->niceString->checkStrings($input, NiceString::MODE_V2)['nice']));
    }
}
