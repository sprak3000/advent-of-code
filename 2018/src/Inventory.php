<?php

namespace adventofcode\Year2018;

class Inventory
{
    /**
     * Given a list of box IDs, compute the checksum for the list.
     *
     * @param array $boxIDs
     * @return int
     */
    public function checksum(array $boxIDs): int
    {
        $twoMatchingLetters = 0;
        $threeMatchingLetters = 0;

        foreach ($boxIDs as $boxId) {
            $letters = str_split($boxId);
            sort($letters);

            $matches = [];

            foreach ($letters as $letter) {
                if (!array_key_exists($letter, $matches)) {
                    $matches[$letter] = 0;
                }

                $matches[$letter]++;
            }

            $twoMatchFound = false;
            $threeMatchFound = false;

            foreach ($matches as $letter => $amount) {
                if (!$twoMatchFound && $amount === 2) {
                    $twoMatchFound = true;
                    $twoMatchingLetters++;
                }

                if (!$threeMatchFound && $amount === 3) {
                    $threeMatchFound = true;
                    $threeMatchingLetters++;
                }

                if ($twoMatchFound && $threeMatchFound) {
                    break;
                }
            }
        }

        return $twoMatchingLetters * $threeMatchingLetters;
    }

    /**
     * Given a list of box IDs, find the two matching boxes and return the matching letters between them.
     * @param array $boxIDs
     * @return string
     */
    public function matchingLetters(array $boxIDs): string
    {
        $commonLetters = '';
        $maximum = count($boxIDs);
        $maximumLetters = strlen($boxIDs[0]);

        $differenceIndex = 0;

        foreach ($boxIDs as $index => $boxId) {
            $letters = str_split($boxId);

            for ($i = $index + 1; $i < $maximum; $i++) {
                $otherLetters = str_split($boxIDs[$i]);

                $differences = 0;
                foreach ($letters as $letterIndex => $letter) {
                    if ($otherLetters[$letterIndex] !== $letter) {
                        $differences++;
                        $differenceIndex = $letterIndex;
                    }

                    if ($differences > 1) {
                        break;
                    }
                }

                if ($differences === 1) {
                    unset($letters[$differenceIndex]);
                    $commonLetters = implode('', $letters);

                    break 2;
                }
            }
        }

        return $commonLetters;
    }
}
