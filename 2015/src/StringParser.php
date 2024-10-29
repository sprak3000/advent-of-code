<?php

namespace adventofcode\Year2015;

class StringParser
{
    /**
     * Given a set of strings, compute the total number of characters of string code and total number
     * of characters in memory.
     *
     * @param array $strings
     * @return array
     */
    public function computeStringUsage(array $strings): array
    {
        $charactersOfStringCode = 0;
        $charactersInMemory = 0;

        foreach ($strings as $string) {
            $charactersOfStringCode += strlen($string);

            // Strip off enclosing quotes
            $string = trim($string, '"');

            // Handle escape sequences.
            $string = str_replace('\\\\', '', $string, $doubleSlashCount);
            $charactersInMemory += $doubleSlashCount;

            $string = str_replace('\\"', '', $string, $escapedQuoteCount);
            $charactersInMemory += $escapedQuoteCount;

            $string = preg_replace("/\\\\[x][A-Za-z0-9]{2}/", '', $string, -1, $hexCharacterCount);
            $charactersInMemory += $hexCharacterCount;

            $charactersInMemory += strlen($string);
        }

        return [
            'charactersOfStringCode' => $charactersOfStringCode,
            'charactersInMemory' => $charactersInMemory,
        ];
    }

    /**
     * Given a set of strings, compute the total number of characters of string code and total number
     * of characters for an encoded version of the string.
     *
     * @param array $strings
     * @return array
     */
    public function computeEncodedStringUsage(array $strings): array
    {
        $charactersOfStringCode = 0;
        $charactersOfEncodedStrings = 0;

        foreach ($strings as $string) {
            $charactersOfStringCode += strlen($string);

            $string = '"' . addslashes($string) . '"';

            $charactersOfEncodedStrings += strlen($string);
        }

        return [
            'charactersOfStringCode' => $charactersOfStringCode,
            'charactersOfEncodedStrings' => $charactersOfEncodedStrings,
        ];
    }
}
