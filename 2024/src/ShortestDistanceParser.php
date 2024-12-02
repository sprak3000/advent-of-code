<?php

namespace adventofcode\Year2024;

class ShortestDistanceParser
{
    protected int $shortestDistanceSum = 0;
    protected int $similarityScoreSum = 0;
    protected array $leftList;
    protected array $rightList;

    /**
     * Finds the sum of the shortest distance values based on the lists provided.
     *
     * @param array $listValues
     * @return int
     */
    public function findShortestDistanceSum(array $listValues): int
    {
        $this->shortestDistanceSum = 0;
        $this->leftList = [];
        $this->rightList = [];

        foreach ($listValues as $listEntry) {
            list($leftValue, $rightValue) = explode('   ', $listEntry);
            $this->leftList[] = (int)$leftValue;
            $this->rightList[] = (int)$rightValue;
        }

        sort($this->leftList);
        sort($this->rightList);

        foreach ($this->leftList as $index => $leftItem) {
            $rightItem = $this->rightList[$index];
            $this->shortestDistanceSum += $leftItem < $rightItem ? ($rightItem - $leftItem) : ($leftItem - $rightItem);
        }

        return $this->shortestDistanceSum;
    }

    /**
     * Finds the sum of the shortest distance values based on the lists provided.
     *
     * @param array $listValues
     * @return int
     */
    public function findSimilarityScoreSum(array $listValues): int
    {
        $this->similarityScoreSum = 0;
        $this->leftList = [];
        $this->rightList = [];

        foreach ($listValues as $listEntry) {
            list($leftValue, $rightValue) = explode('   ', $listEntry);
            $this->leftList[] = (int)$leftValue;
            $rightIndex = (int)$rightValue;

            if (!array_key_exists($rightIndex, $this->rightList)) {
                $this->rightList[$rightIndex] = 0;
            }
            $this->rightList[$rightIndex]++;
        }

        foreach ($this->leftList as $index => $leftItem) {
            $this->similarityScoreSum +=
                array_key_exists($leftItem, $this->rightList) ? ($leftItem * $this->rightList[$leftItem]) : 0;
        }

        return $this->similarityScoreSum;
    }
}
