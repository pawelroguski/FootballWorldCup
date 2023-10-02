<?php

namespace FootballWorldCup;

use InvalidArgumentException;
use LogicException;

class GameManager implements GameManagerInterface
{
    protected array $allGames = [];

    public function startGame(GameInterface $game): void
    {
        if ($this->_returnGameIndexOrFalse($game) !== false) {
            throw new LogicException();
        }

        $this->allGames[] = $game;
    }

    public function finishGame(GameInterface $game): void
    {
        $index = $this->_returnGameIndexOrFalse($game);
        if ($index === false) {
            throw new LogicException();
        }
        unset($this->allGames[$index]);
    }

    public function updateScore(
        GameInterface $game,
        int $homeTeamScore,
        int $awayTeamScore
    ): void
    {
        if ($homeTeamScore < 0 || $awayTeamScore < 0) {
            throw new InvalidArgumentException();
        }
        if ($this->_returnGameIndexOrFalse($game) === false) {
            throw new LogicException();
        }
        $game->setHomeTeamScore($homeTeamScore);
        $game->setAwayTeamScore($awayTeamScore);
    }

    public function getAllGames(): array
    {
        return $this->allGames;
    }

    private function _returnGameIndexOrFalse(GameInterface $game): false|int
    {
        return array_search($game, $this->getAllGames());
    }
}
