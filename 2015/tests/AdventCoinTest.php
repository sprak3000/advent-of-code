<?php

namespace adventofcode\Year2015\Test;

use adventofcode\Year2015\AdventCoin;
use PHPUnit\Framework\TestCase;

class AdventCoinTest extends TestCase
{
    protected $adventCoin;

    protected function setup(): void
    {
        $this->adventCoin = new AdventCoin();
    }

    public function testMine()
    {
        // Day 4 Part 1 example inputs
        $this->assertSame(609043, $this->adventCoin->mine('abcdef'));
        $this->assertSame(1048970, $this->adventCoin->mine('pqrstuv'));

        // Day 4 puzzle input
        $input = file_get_contents(__DIR__ . '/../inputs/day-04.input');
        $this->assertSame(346386, $this->adventCoin->mine($input));
        $this->assertSame(9958218, $this->adventCoin->mine($input, 6));
    }
}
