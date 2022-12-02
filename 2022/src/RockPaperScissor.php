<?php

namespace adventofcode\Year2022;

class RockPaperScissor
{
    const POINTS_FOR_WIN = 6;
    const POINTS_FOR_LOSS = 0;
    const POINTS_FOR_DRAW = 3;

    const POINTS_PLAY_ROCK = 1;
    const POINTS_PLAY_PAPER = 2;
    const POINTS_PLAY_SCISSORS = 3;

    const OPPONENT_ROCK = 'A';
    const OPPONENT_PAPER = 'B';
    const OPPONENT_SCISSORS = 'C';

    const SELF_ROCK = 'X';
    const SELF_PAPER = 'Y';
    const SELF_SCISSORS = 'Z';

    const SELF_LOSE = 'X';
    const SELF_DRAW = 'Y';
    const SELF_WIN = 'Z';

    protected int $totalScore = 0;

    /**
     * Finds the total score based on both plays in a strategy meaning shapes.
     *
     * @param array $strategy
     * @return int
     */
    public function findTotalScoreWrongAssumption(array $strategy): int
    {
        $this->totalScore = 0;

        foreach ($strategy as $play) {
            $this->totalScore += $this->calculateScoreWrongAssumption($play);
        }

        return $this->totalScore;
    }

    /**
     * Finds the total score based on opponent play is a shape, your play is outcome of attempt.
     *
     * @param array $strategy
     * @return int
     */
    public function findTotalScore(array $strategy): int
    {
        $this->totalScore = 0;

        foreach ($strategy as $play) {
            $this->totalScore += $this->calculateScore($play);
        }

        return $this->totalScore;
    }

    protected function isDraw(string $opponent, string $you): bool
    {
        return ($opponent === self::OPPONENT_ROCK && $you === self::SELF_ROCK) ||
            ($opponent === self::OPPONENT_PAPER && $you === self::SELF_PAPER) ||
            ($opponent === self::OPPONENT_SCISSORS && $you === self::SELF_SCISSORS);
    }

    protected function calculateScoreWrongAssumption(string $play): int
    {
        list($opponent, $you) = explode(' ', $play);

        if ($this->isDraw($opponent, $you)) {
            switch ($you) {
                case self::SELF_ROCK:
                    return self::POINTS_FOR_DRAW + self::POINTS_PLAY_ROCK;
                case self::SELF_PAPER:
                    return self::POINTS_FOR_DRAW + self::POINTS_PLAY_PAPER;
                default:
                    return self::POINTS_FOR_DRAW + self::POINTS_PLAY_SCISSORS;
            }
        }

        if ($opponent === self::OPPONENT_ROCK && $you === self::SELF_PAPER) {
            return self::POINTS_FOR_WIN + self::POINTS_PLAY_PAPER;
        }

        if ($opponent === self::OPPONENT_ROCK && $you === self::SELF_SCISSORS) {
            return self::POINTS_FOR_LOSS + self::POINTS_PLAY_SCISSORS;
        }

        if ($opponent === self::OPPONENT_PAPER && $you === self::SELF_SCISSORS) {
            return self::POINTS_FOR_WIN + self::POINTS_PLAY_SCISSORS;
        }

        if ($opponent === self::OPPONENT_PAPER && $you === self::SELF_ROCK) {
            return self::POINTS_FOR_LOSS + self::POINTS_PLAY_ROCK;
        }

        if ($opponent === self::OPPONENT_SCISSORS && $you === self::SELF_ROCK) {
            return self::POINTS_FOR_WIN + self::POINTS_PLAY_ROCK;
        }

        if ($opponent === self::OPPONENT_SCISSORS && $you === self::SELF_PAPER) {
            return self::POINTS_FOR_LOSS + self::POINTS_PLAY_PAPER;
        }

        return 0;
    }

    protected function calculateScore(string $play):int
    {
        list($opponent, $you) = explode(' ', $play);

        if ($you === self::SELF_WIN && $opponent === self::OPPONENT_ROCK) {
            return self::POINTS_FOR_WIN + self::POINTS_PLAY_PAPER;
        }

        if ($you === self::SELF_WIN && $opponent === self::OPPONENT_SCISSORS) {
            return self::POINTS_FOR_WIN + self::POINTS_PLAY_ROCK;
        }

        if ($you === self::SELF_WIN && $opponent === self::OPPONENT_PAPER) {
            return self::POINTS_FOR_WIN + self::POINTS_PLAY_SCISSORS;
        }

        if ($you === self::SELF_LOSE && $opponent === self::OPPONENT_ROCK) {
            return self::POINTS_FOR_LOSS + self::POINTS_PLAY_SCISSORS;
        }

        if ($you === self::SELF_LOSE && $opponent === self::OPPONENT_SCISSORS) {
            return self::POINTS_FOR_LOSS + self::POINTS_PLAY_PAPER;
        }

        if ($you === self::SELF_LOSE && $opponent === self::OPPONENT_PAPER) {
            return self::POINTS_FOR_LOSS + self::POINTS_PLAY_ROCK;
        }

        if ($you === self::SELF_DRAW && $opponent === self::OPPONENT_ROCK) {
            return self::POINTS_FOR_DRAW + self::POINTS_PLAY_ROCK;
        }

        if ($you === self::SELF_DRAW && $opponent === self::OPPONENT_SCISSORS) {
            return self::POINTS_FOR_DRAW + self::POINTS_PLAY_SCISSORS;
        }

        if ($you === self::SELF_DRAW && $opponent === self::OPPONENT_PAPER) {
            return self::POINTS_FOR_DRAW + self::POINTS_PLAY_PAPER;
        }

        return 0;
    }
}
