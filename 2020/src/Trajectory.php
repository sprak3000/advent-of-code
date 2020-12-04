<?php

namespace adventofcode\Year2020;

class Trajectory
{
    /**
     * @param array $mapLines
     * @return array
     */
    public function generateMap(array $mapLines): array
    {
        $map = [];

        foreach ($mapLines as $mapLine) {
            $map[] = str_split($mapLine);
        }

        return $map;
    }

    /**
     * Plots a trajectory down a list of map lines and counts the number of trees encountered.
     * The trajectory is a right three down one path
     *
     * @param int $stepsRight
     * @param int $stepsDown
     * @param array $map
     * @return int
     */
    public function countTreesInPath(int $stepsRight, int $stepsDown, array $map): int
    {
        $trees = 0;
        $bottomOfMapIndex = count($map) - 1;
        $currentXPosition = 0;
        $currentYPosition = 0;

        while ($currentYPosition < $bottomOfMapIndex) {
            // Move to the right and down. See if we find a tree.
            $currentXPosition += $stepsRight;
            $currentYPosition += $stepsDown;

            // We have gone off the edge of the map. The map geography repeats. Reset to appropriate spot.
            if ($currentXPosition >= count($map[0])) {
                $currentXPosition = $currentXPosition - count($map[0]);
            }

            if ($map[$currentYPosition][$currentXPosition] === '#') {
                $trees++;
            }
        }

        return $trees;
    }
}
