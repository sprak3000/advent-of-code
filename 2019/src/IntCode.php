<?php

namespace adventofcode\Year2019;

class IntCode
{
    public const ADDOPCODE = 1;
    public const MULTIPLYOPCODE = 2;
    public const HALTOPCODE = 99;

    /**
     * Given a set of int code instructions and replacements, run the program and return what is stored in position 0.
     *
     * @param array $instructions
     * @param array $replacements
     * @return int
     */
    public function run(array $instructions, array $replacements = []): int
    {
        foreach ($replacements as $replacement) {
            $instructions[$replacement['index']] = $replacement['value'];
        }

        $index = 0;
        $halt = false;

        do {
            switch ($instructions[$index]) {
                case self::ADDOPCODE:
                    $input1 = $instructions[$instructions[$index + 1]];
                    $input2 = $instructions[$instructions[$index + 2]];
                    $storeIndex = $instructions[$index + 3];
                    $instructions[$storeIndex] = $input1 + $input2;
                    break;
                case self::MULTIPLYOPCODE:
                    $input1 = $instructions[$instructions[$index + 1]];
                    $input2 = $instructions[$instructions[$index + 2]];
                    $storeIndex = $instructions[$index + 3];
                    $instructions[$storeIndex] = $input1 * $input2;
                    break;
                case self::HALTOPCODE:
                    $halt = true;
                    break;
                default:
                    exit('Something went wrong. Opcode: ' . $instructions[$index]);
            }

            $index += 4;
        } while (!$halt);

        return $instructions[0];
    }
}
