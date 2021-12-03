<?php

namespace adventofcode\Year2021;

class Navigation
{
    /**
     * Follow a set of directions and calculate the horizontal and depth positions.
     *
     * @param array $directions
     * @return array
     */
    public function findPosition(array $directions): array
    {
        $position = [
            'horizontal' => 0,
            'depth' => 0,
        ];

        foreach ($directions as $direction) {
            list($direction, $amount) = explode(' ', $direction);

            switch ($direction) {
                case 'forward':
                    $position['horizontal'] += $amount;
                    break;
                case 'up':
                    $position['depth'] -= $amount;
                    break;
                case 'down':
                    $position['depth'] += $amount;
                    break;
            }
        }

        return $position;
    }

    /**
     * Follow a set of directions and calculate the horizontal and depth positions using an aim approach.
     *
     * @param array $directions
     * @param int $initialAim
     * @return array
     */
    public function findPositionByAim(array $directions, int $initialAim = 0): array
    {
        $position = [
            'horizontal' => 0,
            'depth' => 0,
        ];

        $aim = $initialAim;

        foreach ($directions as $direction) {
            list($direction, $amount) = explode(' ', $direction);

            switch ($direction) {
                case 'forward':
                    $position['horizontal'] += $amount;
                    $position['depth'] += $amount * $aim;
                    break;
                case 'up':
                    $aim -= $amount;
                    break;
                case 'down':
                    $aim += $amount;
                    break;
            }
        }

        return $position;
    }
}
