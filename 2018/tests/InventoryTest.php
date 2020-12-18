<?php

namespace adventofcode\Year2018\Test;

use adventofcode\Year2018\Inventory;
use PHPUnit\Framework\TestCase;

class InventoryTest extends TestCase
{
    protected $inventory;

    protected function setup(): void
    {
        $this->inventory = new Inventory();
    }

    public function testChecksum()
    {
        // Day 2 Part 1 sample inputs
        $boxIDs = [
            'abcdef',
            'bababc',
            'abbcde',
            'abcccd',
            'aabcdd',
            'abcdee',
            'ababab',
        ];
        $checksum = $this->inventory->checksum($boxIDs);
        $this->assertSame(12, $checksum);

        // Day 2 Part 1 puzzle input
        $boxIDs = file(__DIR__ . '/../inputs/day-02.input', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        $checksum = $this->inventory->checksum($boxIDs);
        $this->assertSame(6944, $checksum);
    }

    public function testMatchingLetters()
    {
        // Day 2 Part 2 sample inputs
        $boxIDs = [
            'abcde',
            'fghij',
            'klmno',
            'pqrst',
            'fguij',
            'axcye',
            'wvxyz',
        ];
        $result = $this->inventory->matchingLetters($boxIDs);
        $this->assertSame('fgij', $result);

        // Day 2 Part 2 puzzle input
        $boxIDs = file(__DIR__ . '/../inputs/day-02.input', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        $result = $this->inventory->matchingLetters($boxIDs);
        $this->assertSame('srijafjzloguvlntqmphenbkd', $result);
    }
}
