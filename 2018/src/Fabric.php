<?php

namespace adventofcode\Year2018;

class Fabric
{
    /**
     * Given a list of claims, return the square inches of fabric in two or more claims.
     *
     * @param array $claims
     * @return int
     */
    public function overlaps(array $claims): int
    {
        $fabric = [];
        $overlaps = 0;

        foreach ($claims as $claim) {
            $claimDetails = [];
            preg_match('/#(\d+) @ (\d+),(\d+): (\d+)x(\d+)/', $claim, $claimDetails);

            $inchesFromLeft = $claimDetails[2];
            $inchesFromTop = $claimDetails[3];
            $width = $claimDetails[4];
            $maximumWidth = $inchesFromLeft + $width;
            $height = $claimDetails[5];
            $maximumHeight = $inchesFromTop + $height;

            for ($currentHeight = $inchesFromTop; $currentHeight < $maximumHeight; $currentHeight++) {
                for ($currentWidth = $inchesFromLeft; $currentWidth < $maximumWidth; $currentWidth++) {
                    $fabricIndex = $currentHeight . 'x' . $currentWidth;
                    $alreadyClaimed = array_key_exists($fabricIndex, $fabric);

                    if (!$alreadyClaimed) {
                        $fabric[$fabricIndex] = 1;
                    }

                    if ($alreadyClaimed) {
                        $fabric[$fabricIndex]++;
                    }
                }
            }
        }

        foreach ($fabric as $squareInch) {
            if ($squareInch > 1) {
                $overlaps++;
            }
        }

        return $overlaps;
    }

    /**
     * Given a list of claims, find the one ID that doesn't overlap.
     *
     * @param array $claims
     * @return int
     */
    public function doesNotOverlap(array $claims): int
    {
        $totalClaims = count($claims);

        $allClaimIds = [];
        $overlappedClaimIds = [];

        $overlaps = function ($firstUpperLeft, $firstBottomRight, $secondUpperLeft, $secondBottomRight) {
            // One is to the left of other
            if ($secondUpperLeft['x'] > $firstBottomRight['x'] || $firstUpperLeft['x'] > $secondBottomRight['x']) {
                return false;
            }

            // One is above the other
            if ($secondBottomRight['y'] < $firstUpperLeft['y'] || $firstBottomRight['y'] < $secondUpperLeft['y']) {
                return false;
            }

            return true;
        };

        foreach ($claims as $index => $claim) {
            $claimDetails = [];
            preg_match('/#(\d+) @ (\d+),(\d+): (\d+)x(\d+)/', $claim, $claimDetails);

            $firstClaimId = $claimDetails[1];
            $allClaimIds[] = $firstClaimId;
            $inchesFromLeft = $claimDetails[2];
            $inchesFromTop = $claimDetails[3];
            $width = $claimDetails[4];
            $maximumWidth = $inchesFromLeft + $width;
            $height = $claimDetails[5];
            $maximumHeight = $inchesFromTop + $height;

            $firstUpperLeft = [
                'x' => $inchesFromLeft,
                'y' => $inchesFromTop,
            ];

            $firstBottomRight = [
                'x' => $maximumWidth,
                'y' => $maximumHeight,
            ];

            for ($i = $index + 1; $i < $totalClaims; $i++) {
                $claimDetails = [];
                preg_match('/#(\d+) @ (\d+),(\d+): (\d+)x(\d+)/', $claims[$i], $claimDetails);

                $secondClaimId = $claimDetails[1];

                $inchesFromLeft = $claimDetails[2];
                $inchesFromTop = $claimDetails[3];
                $width = $claimDetails[4];
                $maximumWidth = $inchesFromLeft + $width;
                $height = $claimDetails[5];
                $maximumHeight = $inchesFromTop + $height;

                $secondUpperLeft = [
                    'x' => $inchesFromLeft,
                    'y' => $inchesFromTop,
                ];

                $secondBottomRight = [
                    'x' => $maximumWidth,
                    'y' => $maximumHeight,
                ];

                if ($overlaps($firstUpperLeft, $firstBottomRight, $secondUpperLeft, $secondBottomRight)) {
                    if (!in_array($firstClaimId, $overlappedClaimIds)) {
                        $overlappedClaimIds[] = $firstClaimId;
                    }
                    if (!in_array($secondClaimId, $overlappedClaimIds)) {
                        $overlappedClaimIds[] = $secondClaimId;
                    }
                }
            }
        }

        $diff = array_diff($allClaimIds, $overlappedClaimIds);
        return array_shift($diff);
    }
}
