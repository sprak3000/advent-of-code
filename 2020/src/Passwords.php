<?php

namespace adventofcode\Year2020;

class Passwords
{
    /**
     * Checks a list where each line contains a password validity rule and a password.
     * The validity rule specifies a given character must appear at least X amount of times
     * but no more than Y amount of times.
     *
     * @param array $entries
     * @return array|string
     */
    public function validSledRentalPasswords(array $entries): array
    {
        $validPasswords = [];

        foreach ($entries as $entry) {
            $entry = str_replace([' ', ':'], ['-', ''], $entry);

            list($min, $max, $character, $password) = explode('-', $entry);

            preg_match_all("/{$character}/", $entry, $matches);

            $numberOfMatches = count($matches[0]) - 1;

            if ($numberOfMatches >= $min && $numberOfMatches <= $max) {
                $validPasswords[] = $password;
            }
        }

        return $validPasswords;
    }

    /**
     * Checks a list where each line contains a password validity rule and a password.
     * The validity rule specifies a given character must appear in either position X  or Y but not both.
     * There is no index zero concept for the rule.
     *
     * @param array $entries
     * @return array|string
     */
    public function validTobogganCorporatePasswords(array $entries): array
    {
        $validPasswords = [];

        foreach ($entries as $entry) {
            $entry = str_replace([' ', ':'], ['-', ''], $entry);

            list($x, $y, $character, $password) = explode('-', $entry);
            $characterAtX = substr($password, $x - 1, 1);
            $characterAtY = substr($password, $y - 1, 1);

            if (($characterAtX === $character || $characterAtY === $character) && $characterAtX !== $characterAtY) {
                $validPasswords[] = $password;
            }
        }

        return $validPasswords;
    }
}
