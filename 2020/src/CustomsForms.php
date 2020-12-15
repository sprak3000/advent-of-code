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

        $groupID = 0;
        $group = [];

        while (($currentLine = fgets($formsFile)) !== false) {
            if ($currentLine !== "\n") {
                $group[] = trim($currentLine);
            }

            if ($currentLine === "\n") {
                $forms[$groupID] = $group;
                $group = [];
                $groupID++;
            }
        }

        // Close out last passport.
        $forms[$groupID] = $group;

        fclose($formsFile);

        return $forms;
    }

    /**
     * Given an array of customs forms organized by groups, return the amount of "yes" responses from everyone.
     *
     * @param array $forms
     * @return int
     */
    public function anyoneYesResponses(array $forms): int
    {
        $yesResponses = 0;

        foreach ($forms as $group) {
            $formText = implode($group);
            $yesResponses += count(array_unique(str_split($formText)));
        }

        return $yesResponses;
    }

    /**
     * Given an array of customs forms organized by groups, return the amount of "yes" responses everyone made for each
     * question.
     *
     * @param array $forms
     * @return int
     */
    public function everyoneYesResponses(array $forms): int
    {
        $yesResponses = 0;

        foreach ($forms as $group) {
            $data = [];
            foreach ($group as $form) {
                $data[] = str_split($form);
            }

            switch (count($data)) {
                case 1:
                    $yesResponses += count($data[0]);
                    break;
                default:
                    $yesResponses += count(array_intersect(...$data));
                    break;
            }
        }

        return $yesResponses;
    }
}
