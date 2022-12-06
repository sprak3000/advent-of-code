<?php

namespace adventofcode\Year2022;

class Communicator
{
    const MARKER_LENGTH_START_OF_PACKET = 4;
    const MARKER_LENGTH_START_OF_MESSAGE = 14;

    /**
     * Finds the number of character processed before a start of packet marker is detected.
     *
     * @param string $inputStream
     * @param int $markerLength
     * @return int
     */
    public function findCharactersToDetectMarker(string $inputStream, int $markerLength): int
    {
        for ($i = 0; $i < strlen($inputStream); $i++) {
            $sample = str_split(substr($inputStream, $i, $markerLength));
            if (sizeof(array_unique($sample)) === $markerLength) {
                return $i + $markerLength;
            }
        }

        return 0;
    }
}
