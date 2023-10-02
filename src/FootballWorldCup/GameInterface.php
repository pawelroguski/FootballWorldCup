<?php

namespace FootballWorldCup;

interface GameInterface
{
    public function getHomeTeamName(): string;
    public function getAwayTeamName(): string;
    public function setHomeTeamScore(int $homeTeamScore): void;
    public function getHomeTeamScore(): int;
    public function setAwayTeamScore(int $awayTeamScore): void;
    public function getAwayTeamScore(): int;
    public function getTotalScore(): int;
}
