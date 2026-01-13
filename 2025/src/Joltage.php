<?php

namespace adventofcode\Year2025;

use function PHPUnit\Framework\countOf;

class Joltage
{
    /**
     * Finds the sum of all maximum joltages available in the set of batteries.
     *
     * @param array $lines
     * @return int
     */
    public function findMaximumJoltage(array $lines): int
    {
        $sum = 0;

        foreach ($lines as $line) {
            $digits = str_split($line);
            $tens = 0;
            $tensIndex = 0;
            $ones = 0;

            // Stop before last element in array
            for ($i = 0; $i < count($digits) - 1; $i++) {
                if ($tens < $digits[$i]) {
                    $tens = $digits[$i];
                    $tensIndex = $i;
                }
            }

            for ($i = $tensIndex + 1; $i < count($digits); $i++) {
                if ($ones < $digits[$i]) {
                    $ones = $digits[$i];
                }
            }

//            echo $tens . $ones . "\n";

            $sum += ($tens * 10) + $ones;
        }

        return $sum;
    }
}
