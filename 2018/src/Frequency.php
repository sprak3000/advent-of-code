<?php

namespace adventofcode\Year2018;

class Frequency
{
    /**
     * Given a staring frequency and a list of frequency changes, find the resulting frequency.
     *
     * @param int $startingFrequency
     * @param array $changes
     * @return int
     */
    public function applyChanges(int $startingFrequency, array $changes): int
    {
        return $startingFrequency + array_sum($changes);
    }

    /**
     * Given a starting frequency and a list of frequency changes, find the first duplicate frequency encountered.
     *
     * @param int $startingFrequency
     * @param array $changes
     * @return int
     */
    public function findFirstDuplicate(int $startingFrequency, array $changes): int
    {
        $duplicateFound = false;
        $seen = [$startingFrequency];
        $frequency = $startingFrequency;

        while (!$duplicateFound) {
            foreach ($changes as $change) {
                $frequency += $change;

                if (in_array($frequency, $seen)) {
                    $duplicateFound = true;
                    break;
                }

                $seen[] = $frequency;
            }
        }

        return $frequency;
    }
}
