<?php

namespace adventofcode\Year2015;

class ReindeerOlympics
{
    /**
     * Determine the maximum distance flown from a given set of reindeer.
     *
     * @param  array $reindeerData
     * @param  int   $interval
     * @return float
     */
    public function determineFlightWinnerDistance(array $reindeerData, int $interval): float
    {
        $winnersDistance = 0;

        foreach ($reindeerData as $reindeer) {
            $data = $this->parseReindeerData($reindeer);
            $distance = $this->calculateDistance(
                $data['speed'],
                $data['flightTime'],
                $data['oneSecondFlightDistance'],
                $data['restDuration'],
                $interval
            );
            if ($distance > $winnersDistance) {
                $winnersDistance = $distance;
            }
        }

        return $winnersDistance;
    }

    /**
     * Determine the winning points from a given set of reindeer.
     *
     * @param  array $reindeerData
     * @param  int   $interval
     * @return int
     */
    public function determineFlightWinnerPoints(array $reindeerData, int $interval): int
    {
        $contestants = [];

        foreach ($reindeerData as $reindeer) {
            $data = $this->parseReindeerData($reindeer);
            $contestants[] = $data;
        }

        for ($i = 0; $i < $interval; $i++) {
            // Determine each reindeer's current distance.
            foreach ($contestants as $index => $contestant) {
                if (!$contestant['isResting']) {
                    $contestants[$index]['currentDistance'] += $contestant['speed'];

                    if ($contestants[$index]['currentLeg'] + 1 === $contestant['flightTime']) {
                        $contestants[$index]['isResting'] = true;
                        $contestants[$index]['currentLeg'] = 0;

                        continue;
                    }

                    $contestants[$index]['currentLeg']++;
                }

                if ($contestant['isResting'] && $contestant['currentRestTime'] + 1 === $contestant['restDuration']) {
                    $contestants[$index]['isResting'] = false;
                    $contestants[$index]['currentRestTime'] = 0;

                    continue;
                }

                if ($contestant['isResting']) {
                    $contestants[$index]['currentRestTime']++;
                }
            }

            // Find the largest current distance
            $largestDistance = 0;

            foreach ($contestants as $contestant) {
                if ($contestant['currentDistance'] > $largestDistance) {
                    $largestDistance = $contestant['currentDistance'];
                }
            }

            // Update the scores for those in the lead.
            foreach ($contestants as $index => $contestant) {
                if ($contestant['currentDistance'] === $largestDistance) {
                    $contestants[$index]['currentPoints']++;
                }
            }
        }

        $winnersPoints = 0;

        foreach ($contestants as $contestant) {
            if ($contestant['currentPoints'] > $winnersPoints) {
                $winnersPoints = $contestant['currentPoints'];
            }
        }

        return $winnersPoints;
    }

    /**
     * Find the distance covered over a given interval based on the given speed, flight time, and rest duration.
     * All values are in seconds.
     *
     * @param int $speed
     * @param int $flightTime
     * @param float $oneSecondFlightDistance
     * @param int $restDuration
     * @param int $interval
     * @return float
     */
    protected function calculateDistance(
        int $speed,
        int $flightTime,
        float $oneSecondFlightDistance,
        int $restDuration,
        int $interval
    ): float {
        $distance = 0;

        $maxFlightTime = $speed * $flightTime;

        $currentTime = 0;
        while ($currentTime < $interval) {
            if ($maxFlightTime > $interval) {
                $distance += $oneSecondFlightDistance * ($interval - $currentTime);
                $currentTime = $interval;
                continue;
            }

            if ($maxFlightTime + $restDuration > $interval) {
                $distance += $maxFlightTime + ($interval - $currentTime);
                $currentTime = $interval;
                continue;
            }

            $distance += $maxFlightTime;
            $currentTime += $flightTime + $restDuration;
        }

        return $distance;
    }

    /**
     * Parse a string of reindeer flight data.
     *
     * @param  string $reindeer
     * @return array
     */
    protected function parseReindeerData(string $reindeer): array
    {
        preg_match('/(.*) can fly (\d+) km\/s for (\d+).*for (\d+).*/', $reindeer, $matches);

        return [
            'name' => $matches[1],
            'speed' => intval($matches[2]),
            'flightTime' => intval($matches[3]),
            'oneSecondFlightDistance' => $matches[2] / $matches[3],
            'maxFlightTime' => $matches[2] * $matches[3],
            'restDuration' => intval($matches[4]),
            'currentDistance' => 0,
            'currentPoints' => 0,
            'currentLeg' => 0,
            'isResting' => false,
            'currentRestTime' => 0,
        ];
    }
}
