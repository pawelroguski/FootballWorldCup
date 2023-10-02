<?php

namespace FootballWorldCup;

/**
 * Game Interface
 *
 * @category Interface
 * @package  FootballWorldCup
 * @author   Pawel Roguski <kontakt@pawelroguski.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     www.pawelroguski.pl
 */
interface GameInterface
{
    /**
     * Get Home team name
     *
     * @return string
     */
    public function getHomeTeamName(): string;

    /**
     * Get Away team name
     *
     * @return string
     */
    public function getAwayTeamName(): string;

    /**
     * Sets the value of Home team score
     *
     * @param int $homeTeamScore Home team score value
     *
     * @return void
     */
    public function setHomeTeamScore(int $homeTeamScore): void;

    /**
     * Get Home team score value
     *
     * @return int
     */
    public function getHomeTeamScore(): int;

    /**
     * Sets the value of Away team score
     *
     * @param int $awayTeamScore Away team score value
     *
     * @return void
     */
    public function setAwayTeamScore(int $awayTeamScore): void;

    /**
     * Get Away team score value
     *
     * @return int
     */
    public function getAwayTeamScore(): int;

    /**
     * Get Home and Away teams scores values
     *
     * @return int
     */
    public function getTotalScore(): int;
}
