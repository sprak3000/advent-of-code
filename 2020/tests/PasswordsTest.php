<?php

namespace adventofcode\Year2020\Test;

use adventofcode\Year2020\Passwords;
use PHPUnit\Framework\TestCase;

class PasswordsTest extends TestCase
{
    protected $passwords;

    protected function setup(): void
    {
        $this->passwords = new Passwords();
    }

    public function testValidSledRentalPasswords()
    {
        // Day 2 Part 1 example inputs
        $entries = [
            '1-3 a: abcde',
            '1-3 b: cdefg',
            '2-9 c: ccccccccc',
        ];

        $result = $this->passwords->validSledRentalPasswords($entries);

        $this->assertCount(2, $result);
        $this->assertContains('abcde', $result);
        $this->assertContains('ccccccccc', $result);

        // Day 2 Part 1 puzzle inputs
        $entries = file(__DIR__ . '/../inputs/day-02.input', FILE_IGNORE_NEW_LINES);
        $result = $this->passwords->validSledRentalPasswords($entries);

        $this->assertCount(477, $result);
    }

    public function testValidTobogganCorporatePasswords()
    {
        // Day 2 Part 1 example inputs
        $entries = [
            '1-3 a: abcde',
            '1-3 b: cdefg',
            '2-9 c: ccccccccc',
        ];

        $result = $this->passwords->validTobogganCorporatePasswords($entries);

        $this->assertCount(1, $result);
        $this->assertContains('abcde', $result);

        // Day 2 Part 2 puzzle inputs
        $entries = file(__DIR__ . '/../inputs/day-02.input', FILE_IGNORE_NEW_LINES);
        $result = $this->passwords->validTobogganCorporatePasswords($entries);

        $this->assertCount(686, $result);
    }
}
