<?php

namespace FootballWorldCup\Tests;

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function test_should_pass_when_both_teams_scores_updated_properly(){
        $game = new Game('TeamA', 'TeamB');
        $game->setHomeTeamScore(2);
        $game->setAwayTeamScore(3);
        $this->assertEquals(2, $game->getHomeTeamScore());
        $this->assertEquals(3, $game->getAwayTeamScore());
    }

    public function test_should_pass_when_teams_scores_add_properly(){
        $game = new Game('TeamA', 'TeamB');
        $game->setHomeTeamScore(2);
        $game->setAwayTeamScore(3);
        $this->assertEquals(5, $game->getTotalScore());
    }

    public function test_should_pass_when_teams_names_returns_properly(){
        $game = new Game('TeamA', 'TeamB');
        $this->assertEquals('TeamA', $game->getHomeTeamName());
        $this->assertEquals('TeamB', $game->getAwayTeamName());
    }
}
