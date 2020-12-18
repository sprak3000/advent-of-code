<?php

namespace adventofcode\Year2018;

class DutyLog
{
    /**
     * Given a list of duty logs, return the data for the guard asleep the most.
     *
     * @param array $logs
     * @return array
     */
    public function whoSleepsTheMost(array $logs): array
    {
        sort($logs);

        $bestGuardId = 0;
        $mostMinutesAsleep = 0;

        $grid = [];

        $currentGuardId = 0;
        $fellAsleepMinute = 0;

        foreach ($logs as $event) {
            $parsedData = [];

            preg_match('/\[(\d{4}-\d{2}-\d{2}) (\d{2}):(\d{2})\] (.*)/', $event, $parsedData);

            list($allData, $date, $hour, $minute, $detail) = $parsedData;

            if (stripos($detail, 'Guard') !== false) {
                $currentGuardId = str_replace(['Guard #', ' begins shift'], '', $detail);
            }

            if ($detail === 'falls asleep') {
                $fellAsleepMinute = $minute;
            }

            if ($detail === 'wakes up') {
                for ($i = $fellAsleepMinute; $i < $minute; $i++) {
                    $minuteIndex = str_pad($i, 2, '0', STR_PAD_LEFT);

                    if (empty($grid[$currentGuardId][$minuteIndex])) {
                        $grid[$currentGuardId][$minuteIndex] = 0;
                    }

                    $grid[$currentGuardId][$minuteIndex] += 1;
                }
            }
        }

        array_walk($grid, function ($guardData, $guardId) use (&$mostMinutesAsleep, &$bestGuardId) {
            $minutesAsleep = array_sum($guardData);

            if ($minutesAsleep > $mostMinutesAsleep) {
                $mostMinutesAsleep = $minutesAsleep;
                $bestGuardId = $guardId;
            }
        });

        $mostMinutes = max($grid[$bestGuardId]);

        return [
            'ID' => $bestGuardId,
            'minutesAsleep' => $mostMinutes,
            'bestMinute' => array_search($mostMinutes, $grid[$bestGuardId]),
        ];
    }

    public function whoSleepsTheMostOnTheSameMinute(array $logs): array
    {
        sort($logs);

        $bestGuardId = 0;
        $bestSleep = 0;

        $grid = [];

        $currentGuardId = 0;
        $fellAsleepMinute = 0;

        foreach ($logs as $event) {
            $parsedData = [];

            preg_match('/\[(\d{4}-\d{2}-\d{2}) (\d{2}):(\d{2})] (.*)/', $event, $parsedData);

            list($allData, $date, $hour, $minute, $detail) = $parsedData;

            if (stripos($detail, 'Guard') !== false) {
                $currentGuardId = str_replace(['Guard #', ' begins shift'], '', $detail);
            }

            if ($detail === 'falls asleep') {
                $fellAsleepMinute = $minute;
            }

            if ($detail === 'wakes up') {
                for ($i = $fellAsleepMinute; $i < $minute; $i++) {
                    $minuteIndex = str_pad($i, 2, '0', STR_PAD_LEFT);

                    if (empty($grid[$currentGuardId][$minuteIndex])) {
                        $grid[$currentGuardId][$minuteIndex] = 0;
                    }

                    $grid[$currentGuardId][$minuteIndex] += 1;
                }
            }
        }

        array_walk($grid, function ($guardData, $guardId) use (&$bestSleep, &$bestMinute, &$bestGuardId) {
            $maxSleep = max($guardData);
            $maxMinute = array_search($maxSleep, $guardData);

            if ($maxSleep > $bestSleep) {
                $bestMinute = $maxMinute;
                $bestGuardId = $guardId;
                $bestSleep = $maxSleep;
            }
        });

        $mostMinutes = max($grid[$bestGuardId]);

        return [
            'ID' => $bestGuardId,
            'minutesAsleep' => $mostMinutes,
            'bestMinute' => array_search($mostMinutes, $grid[$bestGuardId]),
        ];
    }
}
