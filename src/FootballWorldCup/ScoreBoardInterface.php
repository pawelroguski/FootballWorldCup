<?php

declare(strict_types=1);

namespace FootballWorldCup;

/**
 * ScoreBoard Interface
 *
 * @category Interface
 * @package  FootballWorldCup
 * @author   Pawel Roguski <kontakt@pawelroguski.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     www.pawelroguski.pl
 */
interface ScoreBoardInterface
{
    /**
     * Returns summary with scores of all currently started games
     *
     * @param GameInterface[] $activeGamesCollection Array of currently started games
     *
     * @return string|null
     */
    public function getSummary(array $activeGamesCollection): ?string;
}
