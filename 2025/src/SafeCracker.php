<?php

namespace adventofcode\Year2025;

class SafeCracker
{
    protected int $currentPosition;

    /**
     * Finds the number of times 0 is pointed at after an instruction is performed.
     *
     * @param array $lines
     * @param int $startingPosition
     * @return int
     */
    public function findPointedAtZerosFromInstructions(array $lines, int $startingPosition = 50): int
    {
        $this->currentPosition = $startingPosition;
        $totalZeros = 0;

        foreach ($lines as $line) {
            preg_match("/([RL])(\d+)/", $line, $matches);
            $direction = $matches[1];
            $step = (int) $matches[2];

            if ($direction === 'L') {
                $this->currentPosition = (($this->currentPosition - $step) % 100 + 100) % 100;
            }

            if ($direction === 'R') {
                $this->currentPosition = ($this->currentPosition + $step) % 100;
            }

            if ($this->currentPosition === 0) {
                $totalZeros++;
            }
        }

        return $totalZeros;
    }

    /**
     * Finds the number of times 0 is hit while performing an instruction.
     *
     * @param array $lines
     * @param int $startingPosition
     * @return int
     */
    public function findZerosHitFromInstructions(array $lines, int $startingPosition = 50): int
    {
        $this->currentPosition = $startingPosition;
        $totalZeros = 0;

        foreach ($lines as $line) {
            preg_match("/([RL])(\d+)/", $line, $matches);
            $direction = $matches[1];
            $step = (int) $matches[2];

            if ($direction === 'L') {
                if ($this->currentPosition === 0) {
                    $totalZeros += (int) ($step / 100);
                } elseif ($step >= $this->currentPosition) {
                    $totalZeros += (int) (1 + ($step - $this->currentPosition) / 100);
                }

                $this->currentPosition = (($this->currentPosition - $step) % 100 + 100) % 100;
            }

            if ($direction === 'R') {
                $totalZeros += (int) (($this->currentPosition + $step) / 100);
                $this->currentPosition = ($this->currentPosition + $step) % 100;
            }
        }

        return $totalZeros;
    }
}
