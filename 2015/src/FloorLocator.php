<?php

namespace adventofcode\Year2015;

class FloorLocator
{
    /**
     * Returns the floor you are on once all steps have been taken. You always start on floor 0.
     *
     * @param string $stepsTaken
     * @return int
     */
    public function whereAmI(string $stepsTaken): int
    {
        $floor = 0;

        $steps = str_split($stepsTaken);
        foreach ($steps as $step) {
            switch ($step) {
                case "(":
                    $floor++;
                    break;
                case ")":
                    $floor--;
                    break;
            }
        }

        return $floor;
    }

    /**
     * Returns which step causes you to reach the basement for the first time. You always start on floor 0.
     *
     * @param string $stepsTaken
     * @return int
     */
    public function whenDoIReachTheBasement(string $stepsTaken): int
    {
        $floor = 0;
        $step = 0;

        $steps = str_split($stepsTaken);
        foreach ($steps as $currentStep) {
            $step++;

            switch ($currentStep) {
                case "(":
                    $floor++;
                    break;
                case ")":
                    $floor--;
                    break;
            }

            if ($floor === -1) {
                break;
            }
        }

        return $step;
    }
}
