<?php

namespace adventofcode\Year2021;

class Diagnostics
{
    /**
     * Computes the epsilon and gamma power consumption values from a set of readings.
     *
     * @param array $readings
     * @return array
     */
    public function findPowerConsumption(array $readings): array
    {
        $bits = $this->getBitTable($readings);

        $epsilonByte = '';
        $gammaByte = '';

        foreach ($bits as $bit) {
            if ($bit['0'] > $bit['1']) {
                $gammaByte .= '0';
                $epsilonByte .= '1';
            } else {
                $gammaByte .= '1';
                $epsilonByte .= '0';
            }
        }

        return [
            'epsilon' => bindec($epsilonByte),
            'gamma' => bindec($gammaByte),
        ];
    }

    /**
     * Computes the oxygen generator and CO2 scrubber values from a set of readings.
     *
     * @param array $readings
     * @return array
     */
    public function findLifeSupportRating(array $readings): array
    {
        $oxygen = $this->findOxygenGeneratorRating($readings);
        $co2 = $this->findCO2ScrubberRating($readings);

        return [
            'oxygen generator' => bindec($oxygen),
            'co2 scrubber' => bindec($co2),
        ];
    }

    /**
     * @param array $readings
     * @return string
     */
    private function findOxygenGeneratorRating(array $readings): string
    {
        $position = 0;

        while (sizeof($readings) > 1) {
            $bits = $this->getBitTable($readings);
            $bit = ($bits[$position]['0'] <= $bits[$position]['1']) ? '1' : '0';
            array_walk($readings, function (string $reading, int $key) use (&$readings, $position, $bit) {
                if ($reading[$position] !== $bit) {
                    unset($readings[$key]);
                }
            });

            $position++;
        }

        return array_shift($readings);
    }

    /**
     * @param array $readings
     * @return string
     */
    private function findCO2ScrubberRating(array $readings): string
    {
        $position = 0;

        while (sizeof($readings) > 1) {
            $bits = $this->getBitTable($readings);
            $bit = ($bits[$position]['0'] <= $bits[$position]['1']) ? '0' : '1';
            array_walk($readings, function (string $reading, int $key) use (&$readings, $position, $bit) {
                if ($reading[$position] !== $bit) {
                    unset($readings[$key]);
                }
            });

            $position++;
        }

        return array_shift($readings);
    }

    /**
     * @param array $readings
     * @return array
     */
    private function getBitTable(array $readings): array
    {
        $bits = [];
        foreach ($readings as $reading) {
            foreach (str_split($reading) as $index => $bit) {
                if (!array_key_exists($index, $bits)) {
                    $bits[$index] = [
                        '0' => 0,
                        '1' => 0,
                    ];
                }

                switch ($bit) {
                    case '0':
                        $bits[$index]['0']++;
                        break;

                    default:
                        $bits[$index]['1']++;
                        break;
                }
            }
        }

        return $bits;
    }
}
