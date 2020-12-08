<?php

namespace adventofcode\Year2015;

use Exception;

/**
 * Class HouseLights
 * @package adventofcode\Year2015
 * @todo Should really check the supplied coordinates for validity -- between 0 and 999, x/y pairs make sense, etc.
 */
class HouseLights
{
    /**
     * Map of lights to track on / off / brightness
     * @var int
     */
    protected $lights = [];

    /** @var int */
    protected $lightsLit = 0;
    /** @var int */
    protected $totalBrightness = 0;
    /** @var string */
    protected $currentInstruction;
    /** @var int */
    protected $startX;
    /** @var int */
    protected $startY;
    /** @var int */
    protected $endX;
    /** @var int */
    protected $endY;

    /**
     * Parse an instruction string into its component parts.
     *
     * @param string $instruction
     * @throws Exception
     */
    protected function parseInstruction(string $instruction)
    {
        $result = preg_match('/(.*) (\d+),(\d+) through (\d+),(\d+)/', $instruction, $matches);

        if ($result === false) {
            throw new Exception('Error parsing instruction: ' . $instruction);
        }

        $this->currentInstruction = $matches[1];
        $this->startX = $matches[2];
        $this->startY = $matches[3];
        $this->endX = $matches[4];
        $this->endY = $matches[5];
    }

    /**
     * Turn a specific light entirely on.
     *
     * @param int $x
     * @param int $y
     */
    protected function turnOnLight(int $x, int $y)
    {
        $this->lights[$x][$y] = 1;
        $this->lightsLit++;
    }

    /**
     * Turn a specific light entirely off.
     *
     * @param int $x
     * @param int $y
     */
    protected function turnOffLight(int $x, int $y)
    {
        $this->lights[$x][$y] = 0;
        $this->lightsLit--;
    }

    /**
     * Turn lights on or off based on the supplied instructions.
     *
     * @param array $instructions
     * @throws Exception
     */
    public function followInstructions(array $instructions)
    {
        foreach ($instructions as $instruction) {
            $this->parseInstruction($instruction);

            for ($y = $this->startY; $y <= $this->endY; $y++) {
                for ($x = $this->startX; $x <= $this->endX; $x++) {
                    if (!array_key_exists($x, $this->lights) || !array_key_exists($y, $this->lights[$x])) {
                        $this->lights[$x][$y] = 0;
                    }
                    $lightOn = $this->lights[$x][$y] === 1;

                    switch ($this->currentInstruction) {
                        case 'toggle':
                            if ($lightOn) {
                                $this->turnOffLight($x, $y);
                            } else {
                                $this->turnOnLight($x, $y);
                            }
                            break;
                        case 'turn on':
                            if (!$lightOn) {
                                $this->turnOnLight($x, $y);
                            }
                            break;
                        case 'turn off':
                            if ($lightOn) {
                                $this->turnOffLight($x, $y);
                            }
                            break;
                    }
                }
            }
        }
    }

    /**
     * Get the total number of lights lit.
     *
     * @return int
     */
    public function lightsLit(): int
    {
        return $this->lightsLit;
    }

    /**
     * Increase the brightness of a specific light by the specified amount.
     *
     * @param int $x
     * @param int $y
     * @param int $amount
     */
    protected function increaseBrightness(int $x, int $y, int $amount)
    {
        if (!array_key_exists($x, $this->lights) || !array_key_exists($y, $this->lights[$x])) {
            $this->lights[$x][$y] = 0;
        }
        if ($this->lights[$x][$y] === 0) {
            $this->lightsLit++;
        }

        $this->lights[$x][$y] += $amount;
        $this->totalBrightness += $amount;
    }

    /**
     * Decrease the brightness of a specific light by the specified amount.
     *
     * @param int $x
     * @param int $y
     * @param int $amount
     */
    protected function decreaseBrightness(int $x, int $y, int $amount)
    {
        $newBrightness = $this->lights[$x][$y] - $amount;

        if ($newBrightness <= 0) {
            $this->lightsLit--;
        }

        if ($newBrightness < 0) {
            $this->totalBrightness -= $this->lights[$x][$y];
            $this->lights[$x][$y] = 0;
        } else {
            $this->lights[$x][$y] -= $amount;
            $this->totalBrightness -= $amount;
        }
    }

    /**
     * Adjust the brightness of the lights based on the supplied instructions.
     *
     * @param array $instructions
     * @throws Exception
     */
    public function followBrightnessInstructions(array $instructions)
    {
        foreach ($instructions as $instruction) {
            $this->parseInstruction($instruction);

            for ($y = $this->startY; $y <= $this->endY; $y++) {
                for ($x = $this->startX; $x <= $this->endX; $x++) {
                    switch ($this->currentInstruction) {
                        case 'toggle':
                            $this->increaseBrightness($x, $y, 2);
                            break;
                        case 'turn on':
                            $this->increaseBrightness($x, $y, 1);
                            break;
                        case 'turn off':
                            $this->decreaseBrightness($x, $y, 1);
                            break;
                    }
                }
            }
        }
    }

    /**
     * Get the total brightness of the lights.
     *
     * @return int
     */
    public function totalBrightness(): int
    {
        return $this->totalBrightness;
    }

    /**
     * Reset the lights back to their initial state.
     */
    public function reset()
    {
        $this->lightsLit = 0;
        $this->totalBrightness = 0;

        for ($y = 0; $y < 1000; $y++) {
            for ($x = 0; $x < 1000; $x++) {
                $this->lights[$x][$y] = 0;
            }
        }
    }
}
