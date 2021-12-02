<?php

namespace adventofcode\Year2021;

class DepthCheck
{
    /**
     * Checks a list of depths and determines how many increases from the previous depth occurred.
     *
     * @param array $depths
     * @return int
     */
    public function findDepthIncreases(array $depths): int
    {
        $increases = 0;
        $previousDepth = array_shift($depths);

        foreach ($depths as $depth) {
            if ($depth > $previousDepth) {
                $increases++;
            }
            $previousDepth = $depth;
        }

        return $increases;
    }

    /**
     * Checks a list of depths and determines how many increases from the previous sliding window of depths occurred.
     *
     * @param array $depths
     * @param int $windowSize
     * @return int
     */
    public function findDepthIncreasesBySlidingWindow(array $depths, int $windowSize = 3): int
    {
        $depthWindows = [];

        for ($i = 0; $i < sizeof($depths); $i++) {
            if ($i + 1 >= sizeof($depths) || $i + 2 >= sizeof($depths)) {
                break;
            }
            $depthWindows[] = $depths[$i] + $depths[$i + 1] + $depths[$i + 2];
        }

        return $this->findDepthIncreases($depthWindows);
    }
}
