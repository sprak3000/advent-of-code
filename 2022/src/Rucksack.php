<?php

namespace adventofcode\Year2022;

class Rucksack
{
    /**
     * Given a list of sacks, find the duplicates in each compartment and total up their priorities.
     *
     * @param array $sacks
     * @return int
     */
    public function findDuplicatePriorityTotal(array $sacks): int
    {
        $total = 0;

        foreach ($sacks as $sack) {
            $duplicate = $this->findDuplicateItem($sack);
            $total += $this->calculatePriority($duplicate);
        }

        return $total;
    }

    /**
     * @param array $sacks
     * @return int
     */
    public function findBadgePriorityTotal(array $sacks):int
    {
        $total = 0;

        for ($i = 0; $i < sizeof($sacks); $i += 3) {
            $duplicates = array_intersect(str_split($sacks[$i]), str_split($sacks[$i + 1]), str_split($sacks[$i + 2]));
            $duplicate = array_shift($duplicates);
            $total += $this->calculatePriority($duplicate);
        }

        return $total;
    }

    protected function findDuplicateItem(string $sack): string
    {
        $compartmentSize = strlen($sack) / 2;
        $compartmentOne = str_split(substr($sack, 0, $compartmentSize));
        $compartmentTwo = str_split(substr($sack, $compartmentSize));
        $duplicates = array_intersect($compartmentOne, $compartmentTwo);
        return array_shift($duplicates);
    }

    protected function calculatePriority(string $item): int
    {
        $priorities = [
            'a' => 1,
            'b' => 2,
            'c' => 3,
            'd' => 4,
            'e' => 5,
            'f' => 6,
            'g' => 7,
            'h' => 8,
            'i' => 9,
            'j' => 10,
            'k' => 11,
            'l' => 12,
            'm' => 13,
            'n' => 14,
            'o' => 15,
            'p' => 16,
            'q' => 17,
            'r' => 18,
            's' => 19,
            't' => 20,
            'u' => 21,
            'v' => 22,
            'w' => 23,
            'x' => 24,
            'y' => 25,
            'z' => 26,
        ];

        $priority = $priorities[strtolower($item)];
        if (ctype_upper($item)) {
            $priority += 26;
        }
        return $priority;
    }
}
