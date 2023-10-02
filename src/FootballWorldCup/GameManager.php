<?php
namespace FootballWorldCup;

use InvalidArgumentException;
use LogicException;

/**
 * GameManager Class
 *
 * @category Class
 * @package  FootballWorldCup
 * @author   Pawel Roguski <kontakt@pawelroguski.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     www.pawelroguski.pl
 */
class GameManager implements GameManagerInterface
{
    /**
     * All currently started games
     *
     * @var GameInterface[]
     */
    protected array $activeGamesCollection = [];

    /**
     * Start game action
     *
     * @param GameInterface $game Game object
     *
     * @return void
     */
    public function startGame(GameInterface $game): void
    {
        if ($this->_returnActiveGameIndexOrFalse($game) !== false) {
            throw new LogicException();
        }

        $this->activeGamesCollection[] = $game;
    }

    /**
     * Finish game action
     *
     * @param GameInterface $game Game object
     *
     * @return void
     */
    public function finishGame(GameInterface $game): void
    {
        $index = $this->_returnActiveGameIndexOrFalse($game);
        if ($index === false) {
            throw new LogicException();
        }
        unset($this->activeGamesCollection[$index]);
    }

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
    ): void {
        if ($homeTeamScore < 0 || $awayTeamScore < 0) {
            throw new InvalidArgumentException();
        }
        if ($this->_returnActiveGameIndexOrFalse($game) === false) {
            throw new LogicException();
        }
        $game->setHomeTeamScore($homeTeamScore);
        $game->setAwayTeamScore($awayTeamScore);
    }

    /**
     * Returns all currently started games
     *
     * @return GameInterface[]
     */
    public function getActiveGamesCollection(): array
    {
        return $this->activeGamesCollection;
    }

    /**
     * Returns index of found game or false in case if not found
     *
     * @param GameInterface $game Game object
     *
     * @return false|int
     */
    private function _returnActiveGameIndexOrFalse(GameInterface $game): false|int
    {
        return array_search($game, $this->getActiveGamesCollection());
    }
}

