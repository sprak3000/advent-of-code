<?php

namespace adventofcode\Year2022\Test;

use adventofcode\Year2022\Communicator;
use PHPUnit\Framework\TestCase;

class CommunicatorTest extends TestCase
{
    protected Communicator $comm;
    protected string $inputStream;

    protected function setup(): void
    {
        $this->comm = new Communicator();
        $this->inputStream = file_get_contents(__DIR__ . '/../inputs/day-06.input');
    }

    public function testFindCharactersToDetectMarker()
    {
        // Day 6 Part 1 example inputs
        $result = $this->comm->findCharactersToDetectMarker(
            'mjqjpqmgbljsphdztnvjfqwrcgsmlb',
            Communicator::MARKER_LENGTH_START_OF_PACKET
        );
        $this->assertEquals(7, $result);

        $result = $this->comm->findCharactersToDetectMarker(
            'bvwbjplbgvbhsrlpgdmjqwftvncz',
            Communicator::MARKER_LENGTH_START_OF_PACKET
        );
        $this->assertEquals(5, $result);

        $result = $this->comm->findCharactersToDetectMarker(
            'nppdvjthqldpwncqszvftbrmjlhg',
            Communicator::MARKER_LENGTH_START_OF_PACKET
        );
        $this->assertEquals(6, $result);

        $result = $this->comm->findCharactersToDetectMarker(
            'nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg',
            Communicator::MARKER_LENGTH_START_OF_PACKET
        );
        $this->assertEquals(10, $result);

        $result = $this->comm->findCharactersToDetectMarker(
            'zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw',
            Communicator::MARKER_LENGTH_START_OF_PACKET
        );
        $this->assertEquals(11, $result);

        // Day 6 Part 1 puzzle inputs
        $result = $this->comm->findCharactersToDetectMarker(
            $this->inputStream,
            Communicator::MARKER_LENGTH_START_OF_PACKET
        );
        $this->assertEquals(1640, $result);

        // Day 6 Part 2 example inputs
        $result = $this->comm->findCharactersToDetectMarker(
            'mjqjpqmgbljsphdztnvjfqwrcgsmlb',
            Communicator::MARKER_LENGTH_START_OF_MESSAGE
        );
        $this->assertEquals(19, $result);

        $result = $this->comm->findCharactersToDetectMarker(
            'bvwbjplbgvbhsrlpgdmjqwftvncz',
            Communicator::MARKER_LENGTH_START_OF_MESSAGE
        );
        $this->assertEquals(23, $result);

        $result = $this->comm->findCharactersToDetectMarker(
            'nppdvjthqldpwncqszvftbrmjlhg',
            Communicator::MARKER_LENGTH_START_OF_MESSAGE
        );
        $this->assertEquals(23, $result);

        $result = $this->comm->findCharactersToDetectMarker(
            'nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg',
            Communicator::MARKER_LENGTH_START_OF_MESSAGE
        );
        $this->assertEquals(29, $result);

        $result = $this->comm->findCharactersToDetectMarker(
            'zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw',
            Communicator::MARKER_LENGTH_START_OF_MESSAGE
        );
        $this->assertEquals(26, $result);

        // Day 6 Part 2 puzzle inputs
        $result = $this->comm->findCharactersToDetectMarker(
            $this->inputStream,
            Communicator::MARKER_LENGTH_START_OF_MESSAGE
        );
        $this->assertEquals(3613, $result);
    }
}
