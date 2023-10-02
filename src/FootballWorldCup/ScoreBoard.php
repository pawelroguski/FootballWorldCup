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
     * @param GameInterface[] $activeGamesCollection All games actually started
     *
     * @return string|null
     */
    public function getSummary(array $activeGamesCollection): ?string
    {
        $summary = [];

        if (!count($activeGamesCollection)) {
            return null;
        }

        usort(
            $activeGamesCollection, function (
            GameInterface $a,
            GameInterface $b
        ) use ($activeGamesCollection) {
            if ($a->getTotalScore() == $b->getTotalScore()) {
                return
                    array_search(
                        $b,
                        $activeGamesCollection
                    ) <=> array_search(
                        $a,
                        $activeGamesCollection
                    );
            }
            return $b->getTotalScore() <=> $a->getTotalScore();
        }
        );

        foreach ($activeGamesCollection as $singleGame) {
            $homeTeam = $singleGame->getHomeTeamName();
            $awayTeam = $singleGame->getAwayTeamName();
            $homeTeamScore = $singleGame->getHomeTeamScore();
            $awayTeamScore = $singleGame->getAwayTeamScore();

            $summary[] = "$homeTeam $homeTeamScore - $awayTeam $awayTeamScore";
        }

        return implode("\n", $summary) . "\n";
    }
}
