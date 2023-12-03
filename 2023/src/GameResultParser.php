<?php

namespace adventofcode\Year2023;

class GameResultParser
{
    protected int $possibleGameIDsSum = 0;
    protected int $minimumPowerSum = 0;

    /**
     * Finds the sum of the game IDs that are possible given the required cube amounts.
     *
     * @param  array $games
     * @param  int   $requiredRedCubes
     * @param  int   $requiredBlueCubes
     * @param  int   $requiredGreenCubes
     * @return array
     */
    public function parseGameData(
        array $games,
        int $requiredRedCubes,
        int $requiredGreenCubes,
        int $requiredBlueCubes
    ): array {
        $this->possibleGameIDsSum = 0;
        $this->minimumPowerSum = 0;

        foreach ($games as $row) {
            $gameData = $this->parseGameDataRow($row);
            if ($this->isPossibleGame($gameData['pulls'], $requiredRedCubes, $requiredGreenCubes, $requiredBlueCubes)) {
                $this->possibleGameIDsSum += $gameData['id'];
            }

            $this->minimumPowerSum += $this->findPowerSum($gameData['pulls']);
        }

        return [
            'possibleGameIDsSum' => $this->possibleGameIDsSum,
            'minimumPowerSum' => $this->minimumPowerSum,
        ];
    }

    private function findPowerSum(array $pulls): int
    {
        $set = [
            'red' => 0,
            'green' => 0,
            'blue' => 0,
        ];

        foreach ($pulls as $pull) {
            if (array_key_exists('red', $pull)) {
                if ($pull['red'] > $set['red']) {
                    $set['red'] = $pull['red'];
                }
            }

            if (array_key_exists('green', $pull)) {
                if ($pull['green'] > $set['green']) {
                    $set['green'] = $pull['green'];
                }
            }

            if (array_key_exists('blue', $pull)) {
                if ($pull['blue'] > $set['blue']) {
                    $set['blue'] = $pull['blue'];
                }
            }
        }

        $hadCubes = false;
        $sum = 1;

        if (array_key_exists('red', $set)) {
            $sum *= $set['red'];
            $hadCubes = true;
        }
        if (array_key_exists('green', $set)) {
            $sum *= $set['green'];
            $hadCubes = true;
        }
        if (array_key_exists('blue', $set)) {
            $sum *= $set['blue'];
            $hadCubes = true;
        }

        return $hadCubes ? $sum : 0;
    }

    private function isPossibleGame(
        array $pulls,
        int $requiredRedCubes,
        int $requiredGreenCubes,
        int $requiredBlueCubes
    ): bool {
        foreach ($pulls as $pull) {
            if (array_key_exists('red', $pull) && $pull['red'] > $requiredRedCubes) {
                return false;
            }

            if (array_key_exists('green', $pull) && $pull['green'] > $requiredGreenCubes) {
                return false;
            }

            if (array_key_exists('blue', $pull) && $pull['blue'] > $requiredBlueCubes) {
                return false;
            }
        }

        return true;
    }

    private function parseGameDataRow(string $row): array
    {
        preg_match('/Game (\d+):(.*)/', $row, $matches);
        $id =  $matches[1];
        $events = explode(';', $matches[2]);

        $pulls = [];

        foreach ($events as $event) {
            $pull = [];

            $cubes = explode(',', $event);
            foreach ($cubes as $cube) {
                preg_match('/(\d+) (.*)/', trim($cube), $cubeMatches);
                $pull[$cubeMatches[2]] = intval($cubeMatches[1]);
            }

            $pulls[] = $pull;
        }

        return [
            'id' => intval($id),
            'pulls' => $pulls,
        ];
    }
}
