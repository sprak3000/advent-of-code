<?php

namespace adventofcode\Year2024;

class ReactorReportParser
{
    protected int $safeReportsCount = 0;

    /**
     * Finds the total number of the safe reports.
     *
     * @param array $reports
     * @param bool $applyProblemDampener Apply problem dampener to remove a single problem level; defaults to false
     * @return int
     */
    public function findSafeReportsCount(array $reports, bool $applyProblemDampener = false): int
    {
        $this->safeReportsCount = 0;

        foreach ($reports as $report) {
            $levels = explode(' ', $report);

            $previousChange = '';
            $isSafeChange = true;
            $dampenerUsed = false;

            for ($i = 1; $i < count($levels); $i++) {
                $previousLevel = $levels[$i - 1];
                $currentLevel = $levels[$i];
                $currentChange = $previousLevel < $currentLevel ? 'increase' : 'decrease';

                $isSafeChange = $this->isSafeChange($previousLevel, $currentLevel, $previousChange, $currentChange);

                if (!$isSafeChange) {
                    break;
                }

                $previousChange = $currentChange;
            }

            if ($isSafeChange) {
                $this->safeReportsCount++;
            }
        }

        return $this->safeReportsCount;
    }

    /**
     * @param int $previousLevel
     * @param int $currentLevel
     * @param string $previousChange
     * @param string $currentChange
     * @return bool
     */
    private function isSafeChange(
        int $previousLevel,
        int $currentLevel,
        string $previousChange,
        string $currentChange
    ): bool {
        if ($previousLevel === $currentLevel) {
            return false;
        }

        $diff = abs($currentLevel - $previousLevel);
        if ($diff > 3) {
            return false;
        }

        if (
            ($currentChange === 'increase' && $previousChange === 'decrease') ||
            ($currentChange === 'decrease' && $previousChange === 'increase')
        ) {
            return false;
        }

        return true;
    }
}
