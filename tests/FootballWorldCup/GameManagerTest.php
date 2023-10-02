<?php

namespace FootballWorldCup\Tests;

use FootballWorldCup\Game;
use FootballWorldCup\GameManager;
use InvalidArgumentException;
use LogicException;
use PHPUnit\Framework\TestCase;
use TypeError;

class GameManagerTest extends TestCase
{
    public function test_should_passed_when_game_launched_and_completed_correctly(){
        $manager = new GameManager();
        $game = new Game('TeamA', 'TeamB');
        $manager->startGame($game);
        $this->assertCount(1, $manager->getActiveGamesCollection());
        $manager->finishGame($game);
        $this->assertCount(0, $manager->getActiveGamesCollection());
    }

    public function test_should_pass_when_both_teams_scores_updated_properly(){
        $manager = new GameManager();
        $game = new Game('TeamA', 'TeamB');
        $manager->startGame($game);
        $manager->updateScore($game, 2, 3);
        $this->assertEquals(2, $game->getHomeTeamScore());
        $this->assertEquals(3, $game->getAwayTeamScore());
    }

    /**
     * @dataProvider provideNegativeValuesForScore
     */
    public function test_should_throw_error_when_negative_number_passed_into_score(
        int $homeTeamScore,
        int $awayTeamScore,
        string $expectedException
    ){
        $manager = new GameManager();
        $game = new Game('TeamA', 'TeamB');
        $manager->startGame($game);
        $this->expectException($expectedException);
        $manager->updateScore($game, $homeTeamScore, $awayTeamScore);
    }

    /**
     * @dataProvider provideNullValuesForTeamNames
     */
    public function test_should_throw_error_after_attempt_create_game_with_null_or_empty_team_value(
        ?string $homeTeamName,
        ?string $awayTeamName,
        string $expectedException
    ){
        $manager = new GameManager();
        $this->expectException($expectedException);
        $game = new Game($homeTeamName, $awayTeamName);
        $manager->startGame($game);
    }

    public function test_should_throw_error_after_attempt_finish_not_started_game(){
        $manager = new GameManager();
        $game = new Game('TeamA', 'TeamB');
        $this->expectException(LogicException::class);
        $manager->finishGame($game);
    }

    public function test_should_throw_error_after_attempt_start_same_game_multiple_times(){
        $manager = new GameManager();
        $game = new Game('TeamA', 'TeamB');
        $manager->startGame($game);
        $this->expectException(LogicException::class);
        $manager->startGame($game);
    }

    public function test_should_throw_error_after_attempt_finish_same_game_multiple_times(){
        $manager = new GameManager();
        $game = new Game('TeamA', 'TeamB');
        $manager->startGame($game);
        $manager->finishGame($game);
        $this->expectException(LogicException::class);
        $manager->finishGame($game);
    }

    public function test_should_throw_error_after_attempt_update_score_for_finished_game(){
        $manager = new GameManager();
        $game = new Game('TeamA', 'TeamB');
        $manager->startGame($game);
        $manager->finishGame($game);
        $this->expectException(LogicException::class);
        $manager->updateScore($game, 1, 2);
    }

    public function test_should_throw_error_after_attempt_update_score_for_not_started_game(){
        $manager = new GameManager();
        $game = new Game('TeamA', 'TeamB');
        $this->expectException(LogicException::class);
        $manager->updateScore($game, 1, 2);
    }

    public static function provideNullValuesForTeamNames(): array
    {
        return [
            'null home team name' => [
                'homeTeamName' => null,
                'awayTeamName' => 'TeamB',
                'expectedException' => TypeError::class
            ],
            'null away team name' => [
                'homeTeamName' => 'TeamA',
                'awayTeamName' => null,
                'expectedException' => TypeError::class
            ],
            'null both team names' => [
                'homeTeamName' => null,
                'awayTeamName' => null,
                'expectedException' => TypeError::class
            ],
            'empty home team name' => [
                'homeTeamName' => "",
                'awayTeamName' => 'TeamB',
                'expectedException' => InvalidArgumentException::class
            ],
            'empty away team name' => [
                'homeTeamName' => 'TeamA',
                'awayTeamName' => "",
                'expectedException' => InvalidArgumentException::class
            ],
            'empty both team names' => [
                'homeTeamName' => "",
                'awayTeamName' => "",
                'expectedException' => InvalidArgumentException::class
            ],
        ];
    }

    public static function provideNegativeValuesForScore(): array
    {
        return [
            'negative score value for home team' => [
                'homeTeamScore' => -1,
                'awayTeamScore' => 2,
                'expectedException' => InvalidArgumentException::class
            ],
            'negative score value for away team' => [
                'homeTeamScore' => 1,
                'awayTeamScore' => -2,
                'expectedException' => InvalidArgumentException::class
            ],
            'negative score value for both teams' => [
                'homeTeamScore' => -1,
                'awayTeamScore' => -2,
                'expectedException' => InvalidArgumentException::class
            ],
        ];
    }
}
