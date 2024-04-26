<?php

namespace adventofcode\Year2015;

class CircuitParser
{
    protected array $wires = [];

    public function parse(array $instructions): array
    {
        foreach ($instructions as $instruction) {
            preg_match('/(.*) -> (.*)/', $instruction, $matches);

            $input = $matches[1];
            $wire = $matches[2];

            $result = $this->parseInstruction($input);
            $this->wires[$wire] = $result;
        }

        return $this->wires;
    }

    private function parseInstruction(string $input): int {
        if (preg_match('/(.*) AND (.*)/', $input, $matches)) {
            return (int) $this->wires[$matches[1]] & $this->wires[$matches[2]];
        }

        if (preg_match('/(.*) OR (.*)/', $input, $matches)) {
            return (int) $this->wires[$matches[1]] | $this->wires[$matches[2]];
        }

        if (preg_match('/(.*) LSHIFT (.*)/', $input, $matches)) {
            return (int) $this->wires[$matches[1]] << $matches[2];
        }

        if (preg_match('/(.*) RSHIFT (.*)/', $input, $matches)) {
            return (int) $this->wires[$matches[1]] >> $matches[2];
        }

        if (preg_match('/NOT (.*)/', $input, $matches)) {
            // & 65535 truncates us down to a 16-bit integer
            return (int) ~ $this->wires[$matches[1]] & 65535;
        }

        return $input;
    }
}
