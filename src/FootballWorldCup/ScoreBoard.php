<?php
declare(strict_types=1);

namespace FootballWorldCup;

/**
 * ScoreBoard Class
 *
 * @category Class
 * @package  FootballWorldCup
 * @author   Pawel Roguski <kontakt@pawelroguski.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     www.pawelroguski.pl
 */
class ScoreBoard implements ScoreBoardInterface
{
    /**
     * Returns summary of scores from all currently started games
     *
     * @param GameInterface[] $allGames All games actually started
     *
     * @return string|null
     */
    public function getSummary(array $allGames): ?string
    {
        $summary = [];

        if (!count($allGames)) {
            return null;
        }

        usort(
            $allGames, function (GameInterface $a, GameInterface $b) use ($allGames) {
            if ($a->getTotalScore() == $b->getTotalScore()) {
                return
                    array_search($b, $allGames) <=> array_search($a, $allGames);
            }
            return $b->getTotalScore() <=> $a->getTotalScore();
        }
        );

        foreach ($allGames as $singleGame) {
            $homeTeam = $singleGame->getHomeTeamName();
            $awayTeam = $singleGame->getAwayTeamName();
            $homeTeamScore = $singleGame->getHomeTeamScore();
            $awayTeamScore = $singleGame->getAwayTeamScore();

            $summary[] = "$homeTeam $homeTeamScore - $awayTeam $awayTeamScore";
        }

        return implode("\n", $summary) . "\n";
    }
}
