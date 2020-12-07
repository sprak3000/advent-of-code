<?php

namespace adventofcode\Year2020;

use Exception;

class Passports
{
    /**
     * Given a file path, return the passport data contained in it.
     *
     * @param string $filePath
     * @return array
     * @throws Exception
     */
    public function import(string $filePath): array
    {
        $passports = [];

        if (!file_exists($filePath)) {
            throw new Exception("File {$filePath} does not exist.");
        }

        $passportFile = fopen($filePath, 'r');

        $passportText = '';
        while (($currentLine = fgets($passportFile)) !== false) {
            $passportText .= $currentLine;

            if ($currentLine === "\n") {
                $passports[] = $this->parsePassportData($passportText);
                $passportText = '';
            }
        }

        // Close out last passport.
        $passports[] = $this->parsePassportData($passportText);

        fclose($passportFile);

        return $passports;
    }

    /**
     * Given an array of passports, return the valid ones.
     *
     * @param array $passports
     * @param bool $strict
     * @return array
     */
    public function validate(array $passports, bool $strict = false): array
    {
        $valid = [];

        $pattern = '/byr:([^ ]+) (cid:[^ ]+ )?ecl:[^ ]+ eyr:([^ ]+) hcl:[^ ]+ hgt:([^ ]+) iyr:([^ ]+) pid:.+/';
        if ($strict) {
            // byr:1974 ecl:oth eyr:2029 hcl:#623a2f hgt:161cm iyr:2018 pid:6826285172
            $pattern = '/byr:(\d{4}) (cid:[^ ]+ )?ecl:(amb|blu|brn|gry|grn|hzl|oth) eyr:(\d{4}) hcl:#[0-9a-f]{6} hgt:(\d+)(in|cm) iyr:(\d{4}) pid:\d{9}$/';
        }

        foreach ($passports as $passport) {
            $matched = (preg_match($pattern, $passport, $matches) === 1);

            $byr = $matches[1];
            $eyr = $matches[4];
            $hgt = $matches[5];
            $hgtType = $matches[6];
            $iyr = $matches[7];

            if ($matched && !$strict) {
                $valid[] = $passport;
            }

            if ($matched && $strict && $this->validBirthYear($byr) && $this->validExpirationYear($eyr) && $this->validHeight($hgt,
                    $hgtType) && $this->validIssueYear($iyr)) {
                $valid[] = $passport;
            }
        }

        return $valid;
    }

    /**
     * @param string $year
     * @return bool
     */
    protected function validBirthYear(string $year): bool
    {
        $year = intval($year);
        return $year >= 1920 && $year <= 2002;
    }

    /**
     * @param string $year
     * @return bool
     */
    protected function validExpirationYear(string $year): bool
    {
        $year = intval($year);
        return $year >= 2020 && $year <= 2030;
    }

    /**
     * @param string $year
     * @return bool
     */
    protected function validIssueYear(string $year): bool
    {
        $year = intval($year);
        return $year >= 2010 && $year <= 2020;
    }

    /**
     * @param string $height
     * @param string $type
     * @return bool
     */
    protected function validHeight(string $height, string $type): bool
    {
        $height = intval($height);

        if ($type === 'cm') {
            return $height >= 150 && $height <= 193;
        }

        return $height >= 59 && $height <= 76;
    }

    /**
     * Parse the raw passport data into our preferred format.
     * @param string $rawData
     * @return string
     */
    protected function parsePassportData(string $rawData): string
    {
        $data = explode(' ', str_replace("\n", ' ', trim($rawData)));
        sort($data);
        return implode(' ', $data);
    }
}
