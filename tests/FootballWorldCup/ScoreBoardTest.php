<?php

namespace FootballWorldCup\Tests;

use PHPUnit\Framework\TestCase;
use FootballWorldCup\ScoreBoard;
use TypeError;
use FootballWorldCup\GameManager;
use FootballWorldCup\Game;

class ScoreBoardTest extends TestCase
{
    public function test_should_return_null_in_case_of_pass_empty_array_parameter(){
        $scoreBoard = new ScoreBoard();
        $summary = $scoreBoard->getSummary([]);
        $this->assertEmpty($summary);
    }

    public function test_should_throw_error_in_case_of_pass_non_array_parameter(){
        $scoreBoard = new ScoreBoard();
        $this->expectException(TypeError::class);
        $summary = $scoreBoard->getSummary(null);
    }

    public function test_should_pass_when_result_is_presented_in_correct_order(){
        $manager = new GameManager();
        $scoreBoard = new ScoreBoard();
        $game1 = new Game('TeamA', 'TeamB');
        $game2 = new Game('TeamC', 'TeamD');
        $manager->startGame($game1);
        $manager->startGame($game2);
        $manager->updateScore($game1,2, 3);
        $manager->updateScore($game2,3, 2);
        $summary = $scoreBoard->getSummary([$game1, $game2]);
        $expected = "TeamC 3 - TeamD 2\nTeamA 2 - TeamB 3\n";
        $this->assertEquals($expected, $summary);
    }
}
