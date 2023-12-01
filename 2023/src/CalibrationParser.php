<?php

namespace adventofcode\Year2023;

class CalibrationParser
{
    protected int $calibrationSum = 0;

    /**
     * Finds the sum of the calibration values.
     *
     * @param  array $calibrationValues The list of values to sum
     * @param  bool  $transformWords    Turn words like one, two into integer digits
     * @return int
     */
    public function findCalibrationSum(array $calibrationValues, bool $transformWords = false): int
    {
        $this->calibrationSum = 0;

        foreach ($calibrationValues as $value) {
            if ($transformWords) {
                $value = $this->transformWords($value);
            }

            $numbers = str_split(preg_replace('/[^0-9]/', '', $value));

            if (count($numbers) === 1) {
                $this->calibrationSum += intval($numbers[0] . $numbers[0]);
            }

            if (count($numbers) > 1) {
                $this->calibrationSum += intval($numbers[0] . $numbers[count($numbers) - 1]);
            }
        }

        return $this->calibrationSum;
    }

    /**
     * Transform words like one, two, etc. into integers
     *
     * @param  string $value
     * @return string
     */
    private function transformWords(string $value): string
    {
        $transformedValue = '';
        $value = str_split($value);
        $length = count($value);

        for ($i = 0; $i < $length; $i++) {
            // Emit a number.
            if (preg_match('/\d/', $value[$i])) {
                $transformedValue .= $value[$i];
                continue;
            }

            // Start with a three character window to capture 'one', 'two' , 'six'.
            if ($i + 2 <= $length - 1
                && str_contains($value[$i] . $value[$i + 1] . $value[$i + 2], 'one')
            ) {
                $transformedValue .= '1';
                // Move the window to the next to last character of the word.
                $i += 1;
                continue;
            }

            if ($i + 2 <= $length - 1
                && str_contains($value[$i] . $value[$i + 1] . $value[$i + 2], 'two')
            ) {
                $transformedValue .= '2';
                // Move the window to the next to last character of the word.
                $i += 1;
                continue;
            }

            if ($i + 2 <= $length - 1
                && str_contains($value[$i] . $value[$i + 1] . $value[$i + 2], 'six')
            ) {
                $transformedValue .= '6';
                // Move the window to the last character of the word. No numbers start with 'x'.
                $i += 2;
                continue;
            }

            // Expand window to four characters to capture 'four', 'five', 'nine'
            if ($i + 3 <= $length - 1
                && str_contains($value[$i] . $value[$i + 1] . $value[$i + 2] . $value[$i + 3], 'four')
            ) {
                $transformedValue .= '4';
                // Move the window to the last character of the word. No numbers start with 'r'.
                $i += 2;
                continue;
            }

            if ($i + 3 <= $length - 1
                && str_contains($value[$i] . $value[$i + 1] . $value[$i + 2] . $value[$i + 3], 'five')
            ) {
                $transformedValue .= '5';
                // Move the window to the next to last character of the word.
                $i += 2;
                continue;
            }

            if ($i + 3 <= $length - 1
                && str_contains($value[$i] . $value[$i + 1] . $value[$i + 2] . $value[$i + 3], 'nine')
            ) {
                $transformedValue .= '9';
                // Move the window to the next to last character of the word.
                $i += 2;
                continue;
            }

            // Expend window to five characters to capture 'three', 'seven', 'eight'
            if ($i + 4 <= $length - 1
                && str_contains(
                    $value[$i] . $value[$i + 1] . $value[$i + 2] . $value[$i + 3] . $value[$i + 4],
                    'three'
                )
            ) {
                $transformedValue .= '3';
                // Move the window to the next to last character of the word.
                $i += 3;
                continue;
            }

            if ($i + 4 <= $length - 1
                && str_contains(
                    $value[$i] . $value[$i + 1] . $value[$i + 2] . $value[$i + 3] . $value[$i + 4],
                    'seven'
                )
            ) {
                $transformedValue .= '7';
                // Move the window to the next to last character of the word.
                $i += 3;
                continue;
            }

            if ($i + 4 <= $length - 1
                && str_contains(
                    $value[$i] . $value[$i + 1] . $value[$i + 2] . $value[$i + 3] . $value[$i + 4],
                    'eight'
                )
            ) {
                $transformedValue .= '8';
                // Move the window to the next to last character of the word.
                $i += 3;
            }
        }

        return $transformedValue;
    }
}
