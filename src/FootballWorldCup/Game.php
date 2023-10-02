<?php

declare(strict_types=1);

namespace FootballWorldCup;

use InvalidArgumentException;

/**
 * Game Class
 *
 * @category Class
 * @package  FootballWorldCup
 * @author   Pawel Roguski <kontakt@pawelroguski.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     www.pawelroguski.pl
 */
class Game implements GameInterface
{
    /**
     * Home team score value
     *
     * @var int
     */
    private int $homeTeamScore = 0;

    /**
     * Away team score value
     *
     * @var int
     */
    private int $awayTeamScore = 0;

    /**
     * Game Class constructor
     *
     * @param string $homeTeamName Home team name
     * @param string $awayTeamName Away team name
     *
     * @throws InvalidArgumentException When one of the arguments is empty
     */
    public function __construct(
        private readonly string $homeTeamName,
        private readonly string $awayTeamName
    ) {
        if (empty($this->homeTeamName) || empty($this->awayTeamName)) {
            throw new InvalidArgumentException();
        }
    }

    /**
     * Sets the value of Home team score
     *
     * @param int $homeTeamScore Home team score value
     *
     * @return void
     */
    public function setHomeTeamScore(int $homeTeamScore): void
    {
        $this->homeTeamScore = $homeTeamScore;
    }

    /**
     * Sets the value of Away team score
     *
     * @param int $awayTeamScore Away team score value
     *
     * @return void
     */
    public function setAwayTeamScore(int $awayTeamScore): void
    {
        $this->_awayTeamScore = $awayTeamScore;
    }

    /**
     * Get Home team name
     *
     * @return string
     */
    public function getHomeTeamName(): string
    {
        return $this->homeTeamName;
    }

    /**
     * Get Away team name
     *
     * @return string
     */
    public function getAwayTeamName(): string
    {
        return $this->awayTeamName;
    }

    /**
     * Get score of Home team
     *
     * @return int
     */
    public function getHomeTeamScore(): int
    {
        return $this->homeTeamScore;
    }

    /**
     * Get score of Away Team
     *
     * @return int
     */
    public function getAwayTeamScore(): int
    {
        return $this->awayTeamScore;
    }

    /**
     * Get score summary of Home and Away Teams
     *
     * @return int
     */
    public function getTotalScore(): int
    {
        return $this->homeTeamScore + $this->_awayTeamScore;
    }
}
