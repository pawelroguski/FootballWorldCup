<?php

namespace FootballWorldCup;

/**
 * GameManager Interface
 *
 * @category Interface
 * @package  FootballWorldCup
 * @author   Pawel Roguski <kontakt@pawelroguski.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     www.pawelroguski.pl
 */
interface GameManagerInterface
{
    /**
     * Start game action
     *
     * @param GameInterface $game Game object
     *
     * @return void
     */
    public function startGame(GameInterface $game): void;

    /**
     * Finish game action
     *
     * @param GameInterface $game Game object
     *
     * @return void
     */
    public function finishGame(GameInterface $game): void;

    /**
     * Updates Home and Away teams scores values
     *
     * @param GameInterface $game          Game object
     * @param int           $homeTeamScore Home team score value
     * @param int           $awayTeamScore Away team score value
     *
     * @return void
     */
    public function updateScore(
        GameInterface $game,
        int $homeTeamScore,
        int $awayTeamScore
    ): void;

    /**
     * Returns all currently started games
     *
     * @return GameInterface[]
     */
    public function getActiveGamesCollection(): array;
}
