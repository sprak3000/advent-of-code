<?php

namespace adventofcode\Year2015;

class PresentMaterialsCalculator
{
    private $wrappingPaperSquareFeet = 0;
    private $ribbonFeet = 0;

    /**
     * Returns the smallest area for the given dimensions.
     *
     * @param int $length
     * @param int $width
     * @param int $height
     * @return int
     */
    private function smallestArea(int $length, int $width, int $height): int
    {
        $areas = [
            $length * $width,
            $length * $height,
            $width * $height,
        ];

        sort($areas);

        return $areas[0];
    }

    /**
     * Returns the amount of ribbon needed to wrap the present.
     *
     * @param int $length
     * @param int $width
     * @param int $height
     * @return int
     */
    private function presentRibbon(int $length, int $width, int $height): int
    {
        $dims = [
            $length,
            $width,
            $height,
        ];

        sort($dims);

        return (2 * $dims[0]) + (2 * $dims[1]);
    }

    /**
     * Returns the amount of ribbon needed for a bow. Uses the cubic feet of volume for the present.
     *
     * @param int $length
     * @param int $width
     * @param int $height
     * @return int
     */
    private function bowRibbon(int $length, int $width, int $height): int
    {
        return $length * $width * $height;
    }

    /**
     * Takes in an array of strings of the form "1x1x1" and performs the necessary calculations.
     * @param array $presentDimensions
     */
    public function calculate(array $presentDimensions): void
    {
        $this->wrappingPaperSquareFeet = 0;
        $this->ribbonFeet = 0;

        foreach ($presentDimensions as $present) {
            list($length, $width, $height) = explode('x', $present);
            $smallestArea = $this->smallestArea($length, $width, $height);
            $this->wrappingPaperSquareFeet += (2 * $length * $width) + (2 * $width * $height) +
                (2 * $height * $length) + $smallestArea;
            $this->ribbonFeet += $this->presentRibbon($length, $width, $height) +
                $this->bowRibbon($length, $width, $height);
        }
    }

    /**
     * Returns the amount of square feet of wrapping paper needed.
     * @return int
     */
    public function getWrappingPaperSquareFeet(): int
    {
        return $this->wrappingPaperSquareFeet;
    }

    /**
     * Returns the amount of feet of ribbon needed.
     * @return int
     */
    public function getRibbonFeet(): int
    {
        return $this->ribbonFeet;
    }
}
