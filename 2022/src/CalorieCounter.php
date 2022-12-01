<?php

namespace adventofcode\Year2022;

class CalorieCounter
{
    protected int $maximumCaloriesCarried = 0;

    /**
     * Finds the maximum calories carried by an elf from a list of elf inventories.
     *
     * @param array $calories
     * @return int
     */
    public function findMaxCaloriesCarried(array $calories): int
    {
        $currentInventory = 0;
        foreach ($calories as $calorie) {
            $currentInventory += (int) $calorie;

            if ($currentInventory > $this->maximumCaloriesCarried) {
                $this->maximumCaloriesCarried = $currentInventory;
            }

            // Blank line indicates new elf, new inventory to track.
            if ($calorie === "") {
                $currentInventory = 0;
            }
        }

        return $this->maximumCaloriesCarried;
    }

    /**
     * Finds the total number of calories carried by the top three elf inventories.
     *
     * @param array $calories
     * @return int
     */
    public function findTopThreeCaloriesCarriedTotal(array $calories): int
    {
        $inventories = [];

        $currentInventory = 0;
        foreach ($calories as $calorie) {
            $currentInventory += (int) $calorie;

            // Blank line indicates new elf, new inventory to track.
            if ($calorie === "") {
                $inventories[] = $currentInventory;
                $currentInventory = 0;
            }
        }

        // Didn't have a final blank line processed.
        if ($currentInventory !== 0) {
            $inventories[] = $currentInventory;
        }

        rsort($inventories);

        return $inventories[0] + $inventories[1] + $inventories[2];
    }
}
