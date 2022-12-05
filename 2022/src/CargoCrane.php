<?php

namespace adventofcode\Year2022;

use Exception;

class CargoCrane
{
    /**
     * Given a list of instructions, move crates around and find the top crates at the end.
     *
     * @param string $instructionsFile
     * @param array $crates
     * @param int $skipInstructionLines
     * @param bool $singleMove
     * @return string
     * @throws Exception
     */
    public function findTopCrates(
        string $instructionsFile,
        array $crates,
        int $skipInstructionLines,
        bool $singleMove = false
    ): string {
        $fh = fopen($instructionsFile, 'r');

        if ($fh === false) {
            throw new Exception('Unable to read file ' . $instructionsFile);
        }

        // Skip over the instruction lines holding initial crate state.
        for ($i = 0; $i < $skipInstructionLines; $i++) {
            fgets($fh);
        }

        while (($buffer = fgets($fh)) !== false) {
            preg_match("/move (\d+) from (\d+) to (\d+)/", $buffer, $instructions);

            $numberOfCrates = $instructions[1];
            $from = $instructions[2] - 1;
            $to = $instructions[3] - 1;

            $cratesToMove = array_slice($crates[$from], 0, $numberOfCrates);
            if ($singleMove) {
                $cratesToMove = array_reverse($cratesToMove);
            }
            array_splice($crates[$from], 0, $numberOfCrates);
            $crates[$to] = array_merge($cratesToMove, $crates[$to]);
        }

        fclose($fh);

        $result = '';
        foreach ($crates as $stack) {
            $result .= $stack[0];
        }

        return $result;
    }
}
