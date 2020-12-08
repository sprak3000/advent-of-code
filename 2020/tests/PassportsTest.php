<?php

namespace adventofcode\Year2020\Test;

use Exception;
use adventofcode\Year2020\Passports;
use PHPUnit\Framework\TestCase;

class PassportsTest extends TestCase
{
    protected $passports;

    protected function setup(): void
    {
        $this->passports = new Passports();
    }

    public function testImport()
    {
        // Day 4 sample input
        try {
            $passports = $this->passports->import(__DIR__ . '/../inputs/day-04-sample.input');
        } catch (Exception $e) {
            $this->fail('Unexpected exception thrown importing sample passport file.');
        }

        $this->assertCount(4, $passports);
    }

    public function testValidate()
    {
        // Day 4 sample inputs
        try {
            $passports = $this->passports->import(__DIR__ . '/../inputs/day-04-sample.input');
            $passportsStrict = $this->passports->import(__DIR__ . '/../inputs/day-04-strict-sample.input');
        } catch (Exception $e) {
            $this->fail('Unexpected exception thrown importing sample passport files.');
        }

        $this->assertCount(4, $passports);
        $this->assertCount(8, $passportsStrict);

        $valid = $this->passports->validate($passports);
        $this->assertCount(2, $valid);
        $this->assertContains('byr:1937 cid:147 ecl:gry eyr:2020 hcl:#fffffd hgt:183cm iyr:2017 pid:860033327', $valid);
        $this->assertContains('byr:1931 ecl:brn eyr:2024 hcl:#ae17e1 hgt:179cm iyr:2013 pid:760753108', $valid);

        $valid = $this->passports->validate($passportsStrict, true);
        $this->assertCount(4, $valid);

        // Day 4 Part 1 & 2 input
        try {
            $passports = $this->passports->import(__DIR__ . '/../inputs/day-04.input');
        } catch (Exception $e) {
            $this->fail('Unexpected exception thrown importing passport file.');
        }

        $this->assertCount(257, $passports);

        $valid = $this->passports->validate($passports);
        $this->assertCount(206, $valid);

        $valid = $this->passports->validate($passports, true);
        $this->assertCount(123, $valid);
    }
}
