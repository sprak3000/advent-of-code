<?php

namespace adventofcode\Year2015;

class LookAndSay
{
    /**
     * Play a game of Look and Say.
     *
     * @param  string $input
     * @param  int    $rounds Number of rounds to play
     * @return string
     */
    public function play(string $input, int $rounds): string
    {
        $finalResult = $input;

        for ($i = 0; $i < $rounds; $i++) {
            $characters = str_split($finalResult);

            if (count($characters) === 1) {
                $finalResult = '1' . $characters[0];
                continue;
            }

            $previousCharacter = $characters[0];
            $characterCount = 0;
            $roundResult = '';

            foreach ($characters as $index => $character) {
                if ($character === $previousCharacter) {
                    $characterCount++;

                    if ($index === count($characters) - 1) {
                        $roundResult .= $characterCount . $previousCharacter;
                    }
                    continue;
                }

                $roundResult .= $characterCount . $previousCharacter;
                $previousCharacter = $character;
                $characterCount = 1;

                if ($index === count($characters) - 1) {
                    $roundResult .= $characterCount . $previousCharacter;
                }
            }

            $finalResult = $roundResult;
        }

        return $finalResult;
    }
}
