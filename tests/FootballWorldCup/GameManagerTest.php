<?php

namespace FootballWorldCup\Tests;

use PHPUnit\Framework\TestCase;

class GameManagerTest extends TestCase
{
    public function test_should_passed_when_game_launched_and_completed_correctly(){}

    public function test_should_pass_when_both_teams_scores_updated_properly(){}

    public function test_should_throw_error_when_negative_number_passed_into_score(){}

    public function test_should_throw_error_after_attempt_create_game_with_null_or_empty_team_value(){}

    public function test_should_throw_error_after_attempt_finish_not_started_game(){}

    public function test_should_throw_error_after_attempt_start_same_game_multiple_times(){}

    public function test_should_throw_error_after_attempt_finish_same_game_multiple_times(){}

    public function test_should_throw_error_after_attempt_update_score_for_finished_game(){}

    public function test_should_throw_error_after_attempt_update_score_for_not_started_game(){}
}
