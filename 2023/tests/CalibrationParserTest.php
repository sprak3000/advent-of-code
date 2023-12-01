<?php

namespace adventofcode\Year2023\Test;

use adventofcode\Year2023\CalibrationParser;
use PHPUnit\Framework\TestCase;

class CalibrationParserTest extends TestCase
{
    protected CalibrationParser $calibrationParser;
    protected array|false $sampleCalibrationValues;
    protected array|false $sampleCalibrationValuesWithWords;
    protected array|false $calibrationValues;

    protected function setup(): void
    {
        $this->calibrationParser = new CalibrationParser();
        $this->sampleCalibrationValues = file(__DIR__ . '/../inputs/day-01-sample.input', FILE_IGNORE_NEW_LINES);
        $this->sampleCalibrationValuesWithWords =
            file(__DIR__ . '/../inputs/day-01-sample-part-2.input', FILE_IGNORE_NEW_LINES);
        $this->calibrationValues = file(__DIR__ . '/../inputs/day-01.input', FILE_IGNORE_NEW_LINES);
    }

    public function testFindCalibrationSum()
    {
        // Day 1 Part 1 example inputs
        $result = $this->calibrationParser->findCalibrationSum($this->sampleCalibrationValues);
        $this->assertEquals(142, $result);

        // Day 1 Part 1 puzzle inputs
        $result = $this->calibrationParser->findCalibrationSum($this->calibrationValues);
        $this->assertEquals(54450, $result);
    }

    public function testFindCalibrationSumWithWords()
    {
        // Day 1 Part 2 example inputs
        $result = $this->calibrationParser->findCalibrationSum($this->sampleCalibrationValuesWithWords, true);
        $this->assertEquals(281, $result);

        // Day 1 Part 2 puzzle inputs
        $result = $this->calibrationParser->findCalibrationSum($this->calibrationValues, true);
        $this->assertEquals(54265, $result);
    }
}
