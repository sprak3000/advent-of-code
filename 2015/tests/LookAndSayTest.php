<?php

namespace adventofcode\Year2015\Test;

use adventofcode\Year2015\LookAndSay;
use PHPUnit\Framework\TestCase;

class LookAndSayTest extends TestCase
{
    protected $lookAndSay;

    protected function setup(): void
    {
        $this->lookAndSay = new LookAndSay();
    }

    public function testPlay()
    {
        ini_set("memory_limit", "-1");

        // Day 10 Part 1 example input
        $result = $this->lookAndSay->play('1', 5);
        $this->assertEquals('312211', $result);
        $this->assertEquals(6, strlen($result));

        // Day 10 Part 1 actual input
        $result = $this->lookAndSay->play('3113322113', 40);
        $this->assertEquals(329356, strlen($result));

        // Day 10 Part 2 actual input
        $result = $this->lookAndSay->play('3113322113', 50);
        $this->assertEquals(4666278, strlen($result));
    }
}
