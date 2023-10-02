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
    private int $_homeTeamScore = 0;

    /**
     * Away team score value
     *
     * @var int
     */
    private int $_awayTeamScore = 0;

    /**
     * Game Class constructor
     *
     * @param string $_homeTeamName Home team name
     * @param string $_awayTeamName Away team name
     *
     * @throws InvalidArgumentException When one of the arguments is empty
     */
    public function __construct(
        private readonly string $_homeTeamName,
        private readonly string $_awayTeamName
    ) {
        if (empty($this->_homeTeamName) || empty($this->_awayTeamName)) {
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
        $this->_homeTeamScore = $homeTeamScore;
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
        return $this->_homeTeamName;
    }

    /**
     * Get Away team name
     *
     * @return string
     */
    public function getAwayTeamName(): string
    {
        return $this->_awayTeamName;
    }

    /**
     * Get score of Home team
     *
     * @return int
     */
    public function getHomeTeamScore(): int
    {
        return $this->_homeTeamScore;
    }

    /**
     * Get score of Away Team
     *
     * @return int
     */
    public function getAwayTeamScore(): int
    {
        return $this->_awayTeamScore;
    }

    /**
     * Get score summary of Home and Away Teams
     *
     * @return int
     */
    public function getTotalScore(): int
    {
        return $this->_homeTeamScore + $this->_awayTeamScore;
    }
}
