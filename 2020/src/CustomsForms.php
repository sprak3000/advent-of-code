<?php

namespace adventofcode\Year2020;

use Exception;

class CustomsForms
{
    /**
     * Given a file path, return the customs form data contained in it.
     *
     * @param string $filePath
     * @return array
     * @throws Exception
     */
    public function import(string $filePath): array
    {
        $forms = [];

        if (!file_exists($filePath)) {
            throw new Exception("File {$filePath} does not exist.");
        }

        $formsFile = fopen($filePath, 'r');

        $formsText = '';
        while (($currentLine = fgets($formsFile)) !== false) {
            $formsText .= trim($currentLine);

            if ($currentLine === "\n") {
                $forms[] = $formsText;
                $formsText = '';
            }
        }

        // Close out last passport.
        $forms[] = $formsText;

        fclose($formsFile);

        return $forms;
    }

    /**
     * Given an array of customs forms, return the amount of "yes" responses.
     *
     * @param array $forms
     * @return int
     */
    public function anyoneYesResponses(array $forms): int
    {
        $yesResponses = 0;

        foreach ($forms as $form) {
            $yesResponses += count(array_unique(str_split($form)));
        }

        return $yesResponses;
    }
}
