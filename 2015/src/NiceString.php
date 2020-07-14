<?php

namespace adventofcode\Year2015;

class NiceString
{
    const MODE_V1 = 'v1';
    const MODE_V2 = 'v2';

    /**
     * Determines if the input contains a naughty string.
     *
     * @param string $input
     * @return bool
     */
    protected function containsNaughtyString(string $input): bool
    {
        if (preg_match('/ab|cd|pq|xy/', $input) === 1) {
            return true;
        }

        return false;
    }

    /**
     * Determines if the string contains at least three vowels.
     *
     * @param string $input
     * @return bool
     */
    protected function containsThreeVowels(string $input): bool
    {
        preg_match_all('/[aeiou]/i', $input, $matches);
        if (count($matches[0]) >= 3) {
            return true;
        }

        return false;
    }

    /**
     * Determines if the string contains at least one consecutive duplicate letter, eg., zz.
     *
     * @param string $input
     * @return bool
     */
    protected function containsConsecutiveDuplicateLetter(string $input): bool
    {
        if (preg_match('/(\w)\1/', $input) === 1) {
            return true;
        }

        return false;
    }

    /**
     * Determines if the string contains multiple letter pairs, e.g., qj is found twice.
     *
     * @param string $input
     * @return bool
     */
    protected function containsMultipleLetterPairs(string $input): bool
    {
        $letters = str_split($input);

        for ($i = 0; $i < count($letters) - 1; $i++) {
            preg_match_all('/(' . $letters[$i] . $letters[$i + 1] . ')/', $input, $matches);
            if (count($matches[0]) > 1) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determines if the string contains a duplicate letter with exactly one character between, e.g., xzx.
     *
     * @param string $input
     * @return bool
     */
    protected function containsDuplicateLetterWithOneCharacterBetween(string $input): bool
    {
        $letters = str_split($input);

        for ($i = 0; $i < count($letters); $i++) {
            preg_match_all('/(' . $letters[$i] . '.' . $letters[$i] . ')/', $input, $matches);
            if (count($matches[0]) > 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determines if a string is naughty or nice based on the given mode.
     *
     * @param string $input
     * @param string $mode
     * @return bool
     */
    public function isNice(string $input, string $mode = self::MODE_V1): bool
    {
        switch ($mode) {
            case self::MODE_V2:
                if ($this->containsMultipleLetterPairs($input) &&
                    $this->containsDuplicateLetterWithOneCharacterBetween($input)) {
                    return true;
                }

                break;
            default:
                if ($this->containsNaughtyString($input)) {
                    return false;
                }

                if ($this->containsThreeVowels($input) && $this->containsConsecutiveDuplicateLetter($input)) {
                    return true;
                }

                break;
        }

        return false;
    }

    /**
     * Checks a list of strings and returns which are nice and which are naughty.
     *
     * @param array $strings
     * @param string $mode
     * @return array|array[]
     */
    public function checkStrings(array $strings, string $mode = self::MODE_V1): array
    {
        $result = [
            'nice' => [],
            'naughty' => [],
        ];

        foreach ($strings as $string) {
            if ($this->IsNice($string, $mode)) {
                $result['nice'][] = $string;
            } else {
                $result['naughty'][] = $string;
            }
        }

        return $result;
    }
}
