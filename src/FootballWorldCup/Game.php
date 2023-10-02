<?php

namespace FootballWorldCup;

use InvalidArgumentException;

class Game
{
    private int $_homeTeamScore = 0;
    private int $_awayTeamScore = 0;

    public function __construct(
        private readonly string $_homeTeamName,
        private readonly string $_awayTeamName
    ) {
        if (empty($this->_homeTeamName) || empty($this->_awayTeamName)) {
            throw new InvalidArgumentException();
        }
    }

    public function setHomeTeamScore(int $homeTeamScore): void
    {
        $this->_homeTeamScore = $homeTeamScore;
    }

    public function setAwayTeamScore(int $awayTeamScore): void
    {
        $this->_awayTeamScore = $awayTeamScore;
    }

    public function getHomeTeamName(): string
    {
        return $this->_homeTeamName;
    }

    public function getAwayTeamName(): string
    {
        return $this->_awayTeamName;
    }

    public function getHomeTeamScore(): int
    {
        return $this->_homeTeamScore;
    }

    public function getAwayTeamScore(): int
    {
        return $this->_awayTeamScore;
    }

    public function getTotalScore(): int
    {
        return $this->_homeTeamScore + $this->_awayTeamScore;
    }
}
