<?php

namespace adventofcode\Year2019;

class FuelCalculator
{
    /**
     * Given an array of mass values, calculate the total fuel and additional fuel needed.
     *
     * @param array $masses
     * @return array
     */
    public function totalUsage(array $masses): array
    {
        $totalFuel = 0;
        $additionalFuel = 0;

        array_walk(
            $masses,
            function ($mass) use (&$totalFuel, &$additionalFuel) {
                $fuel = floor($mass / 3) - 2;
                $totalFuel += $fuel;

                $calculateAdditionalFuel = function ($fuel) use (&$calculateAdditionalFuel) {
                    $additionalFuel = floor($fuel / 3) - 2;

                    if ($additionalFuel <= 0) {
                        return 0;
                    }

                    return $additionalFuel + $calculateAdditionalFuel($additionalFuel);
                };

                $additionalFuel += $calculateAdditionalFuel($fuel);
            }
        );

        return [
            'total' => intval($totalFuel),
            'additional' => intval($additionalFuel),
        ];
    }
}
