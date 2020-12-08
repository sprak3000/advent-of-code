<?php

namespace adventofcode\Year2015;

class PresentDelivery
{
    /**
     * Given a map of directions to houses, return a map of the houses that received presents from Santa.
     *
     * @param string $routeMap
     * @return array
     */
    public function makeDeliveries(string $routeMap): array
    {
        $map = [];
        $x = 0;
        $y = 0;

        // Deliver present to first house
        $map[$x . ',' . $y] = 1;

        $directions = str_split($routeMap);
        foreach ($directions as $direction) {
            // Determine next house
            switch ($direction) {
                case ">":
                    $x++;
                    break;
                case "^":
                    $y++;
                    break;
                case "<":
                    $x--;
                    break;
                case "v":
                    $y--;
                    break;
            }

            // Deliver present to new house
            $map[$x . ',' . $y]++;
        }

        return $map;
    }

    /**
     * Given a map of directions to houses, return a map of the houses that received presents from Santa
     * and/or Robo-Santa.
     *
     * @param string $routeMap
     * @return array
     */
    public function makeRoboDeliveries(string $routeMap): array
    {
        $map = [];
        $santaX = 0;
        $santaY = 0;
        $roboSantaX = 0;
        $roboSantaY = 0;


        // Santa and Robo-Santa deliver a present to first house
        $map[$santaX . ',' . $santaY] = 2;

        $directions = str_split($routeMap);
        for ($i = 0; $i < count($directions); $i += 2) {
            // Determine next house for Santa
            switch ($directions[$i]) {
                case ">":
                    $santaX++;
                    break;
                case "^":
                    $santaY++;
                    break;
                case "<":
                    $santaX--;
                    break;
                case "v":
                    $santaY--;
                    break;
            }

            // Determine next house for Robo-Santa
            switch ($directions[$i + 1]) {
                case ">":
                    $roboSantaX++;
                    break;
                case "^":
                    $roboSantaY++;
                    break;
                case "<":
                    $roboSantaX--;
                    break;
                case "v":
                    $roboSantaY--;
                    break;
            }

            // Deliver present to new houses
            if (!array_key_exists($santaX . ',' . $santaY, $map)) {
                $map[$santaX . ',' . $santaY] = 0;
            }
            $map[$santaX . ',' . $santaY]++;

            if (!array_key_exists($roboSantaX . ',' . $roboSantaY, $map)) {
                $map[$roboSantaX . ',' . $roboSantaY] = 0;
            }
            $map[$roboSantaX . ',' . $roboSantaY]++;
        }

        return $map;
    }
}
