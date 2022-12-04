<?php

namespace adventofcode\Year2022\Test;

use adventofcode\Year2022\CalorieCounter;
use PHPUnit\Framework\TestCase;

class CalorieCounterTest extends TestCase
{
    protected CalorieCounter $calorieCounter;
    protected array|false $sampleCalories;
    protected array|false $calories;

    protected function setup(): void
    {
        $this->calorieCounter = new CalorieCounter();
        $this->sampleCalories = file(__DIR__ . '/../inputs/day-01-sample.input', FILE_IGNORE_NEW_LINES);
        $this->calories = file(__DIR__ . '/../inputs/day-01.input', FILE_IGNORE_NEW_LINES);
    }

    public function testFindMaxCaloriesCarried()
    {
        // Day 1 Part 1 example inputs
        $result = $this->calorieCounter->findMaxCaloriesCarried($this->sampleCalories);
        $this->assertEquals(24000, $result);

        // Day 1 Part 1 puzzle inputs
        $result = $this->calorieCounter->findMaxCaloriesCarried($this->calories);
        $this->assertEquals(68923, $result);
    }

    public function testFindTopThreeCaloriesCarriedTotal()
    {
        // Day 1 Part 2 example inputs
        $result = $this->calorieCounter->findTopThreeCaloriesCarriedTotal($this->sampleCalories);
        $this->assertEquals(45000, $result);

        // Day 1 Part 2 puzzle inputs
        $result = $this->calorieCounter->findTopThreeCaloriesCarriedTotal($this->calories);
        $this->assertEquals(200044, $result);
    }
}
