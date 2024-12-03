<?php

namespace adventofcode\Year2024;

class MultiplyInstructionParser
{
    protected int $sum = 0;

    /**
     * Finds the sum of the multiply instructions found in the given input.
     *
     * @param array $lines
     * @return int
     */
    public function findMultiplyInstructionSum(array $lines): int
    {
        $this->sum = 0;

        foreach ($lines as $line) {
            preg_match_all("/mul\(\d+,\d+\)/", $line, $matches);
            foreach ($matches[0] as $match) {
                list($first, $second) = explode(',', str_replace(['mul(', ')'], [], $match));
                $this->sum += $first * $second;
            }
        }

        return $this->sum;
    }

    /**
     * Finds the sum of the extended multiply instructions found in the given input.
     *
     * @param array $lines
     * @return int
     */
    public function findExtendedMultiplyInstructionSum(array $lines): int
    {
        $this->sum = 0;

        $multiplyEnabled = true;
        foreach ($lines as $line) {
            preg_match_all("/mul\(\d+,\d+\)|don't\(\)|do\(\)/", $line, $matches);
            foreach ($matches[0] as $match) {
                if ($match === "don't()") {
                    $multiplyEnabled = false;
                    continue;
                }

                if ($match === 'do()') {
                    $multiplyEnabled = true;
                    continue;
                }

                if ($multiplyEnabled) {
                    list($first, $second) = explode(',', str_replace(['mul(', ')'], [], $match));
                    $this->sum += $first * $second;
                }
            }
        }

        return $this->sum;
    }
}
