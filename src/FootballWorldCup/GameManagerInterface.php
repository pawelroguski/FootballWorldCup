<?php

namespace FootballWorldCup;

interface GameManagerInterface
{
    public function startGame(GameInterface $game): void;
    public function finishGame(GameInterface $game): void;
    public function updateScore(
        GameInterface $game,
        int $homeTeamScore,
        int $awayTeamScore
    ): void;
    public function getAllGames(): array;
}
