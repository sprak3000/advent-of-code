<?php

namespace adventofcode\Year2022;

class CleaningAssignment
{
    /**
     * Given a list of assignment pairs, find any completely overlapping assignments.
     *
     * @param array $assignments
     * @return int
     */
    public function findCompleteOverlaps(array $assignments): int
    {
        $overlaps = 0;

        foreach ($assignments as $pairs) {
            list($pairOne, $pairTwo) = explode(',', $pairs);

            if ($this->hasCompleteOverlap($pairOne, $pairTwo)) {
                $overlaps++;
            }
        }

        return $overlaps;
    }

    /**
     * Given a list of assignment pairs, find any overlapping assignments.
     *
     * @param array $assignments
     * @return int
     */
    public function findAnyOverlaps(array $assignments): int
    {
        $overlaps = 0;

        foreach ($assignments as $pairs) {
            list($pairOne, $pairTwo) = explode(',', $pairs);

            if ($this->hasAnyOverlap($pairOne, $pairTwo)) {
                $overlaps++;
            }
        }

        return $overlaps;
    }

    protected function hasCompleteOverlap(string $pairOne, string $pairTwo):bool
    {
        list($pairOneMin, $pairOneMax) = explode('-', $pairOne);
        list($pairTwoMin, $pairTwoMax) = explode('-', $pairTwo);

        // First pair in assignment completely contains second pair
        if ($pairOneMin >= $pairTwoMin && $pairOneMax <= $pairTwoMax) {
            return true;
        }

        // Second pair in assignment completely contains first pair
        if ($pairTwoMin >= $pairOneMin && $pairTwoMax <= $pairOneMax) {
            return true;
        }

        return false;
    }

    protected function hasAnyOverlap(string $pairOne, string $pairTwo):bool
    {
        list($pairOneMin, $pairOneMax) = explode('-', $pairOne);
        list($pairTwoMin, $pairTwoMax) = explode('-', $pairTwo);

        if ($pairTwoMin >= $pairOneMin && $pairTwoMin <= $pairOneMax) {
            return true;
        }

        if ($pairTwoMax >= $pairOneMin && $pairTwoMax <= $pairOneMax) {
            return true;
        }

        if ($pairOneMin >= $pairTwoMin && $pairOneMin <= $pairTwoMax) {
            return true;
        }

        if ($pairOneMax >= $pairTwoMin && $pairOneMax <= $pairTwoMax) {
            return true;
        }

        return false;
    }
}
