## FootballWorldCup

### About

FootballWorldCup is a PHP project that helps in managing and keeping track of football games, scores, and teams during a World Cup event. The project includes a set of classes and interfaces that encapsulate the various entities and actions related to football games.

### Requirements
PHP 8.0 or higher

### Project Structure
The project is structured as follows:
- `src/` - contains the source code of the project
- `tests/` - contains the unit tests for the project
- `vendor/` - contains the dependencies installed via Composer
- `composer.json` - contains the project dependencies
- `phpunit.xml` - contains the PHPUnit configuration
- `LICENSE` - contains the GNU General Public License
- `README.md` - contains the project documentation

The project consists of six main files that are located in the `src/` directory:
- `Game.php` - represents a single football game
- `GameInterface.php` - represents a single football game interface
- `GameManager.php` - represents a game manager
- `GameManagerInterface.php` - represents a game manager interface
- `ScoreBoard.php` - represents a football game score board
- `ScoreBoardInterface.php` - represents a football game score board interface

All located in the namespace FootballWorldCup.


### Getting Started
Clone the repository to your local machine to get started with the FootballWorldCup project.
```bash
git clone https://github.com/pawelroguski/FootballWorldCup.git
cd FootballWorldCup
composer install
```

### Basic usage
```php
$manager = new GameManager();
$scoreBoard = new ScoreBoard();

$game1 = new Game("Mexico", "Canada");
$game2 = new Game("Spain", "Brazil");

$manager->startGame($game1);
$manager->startGame($game2);

$manager->updateScore($game1, 0, 5);
$manager->updateScore($game2, 10, 2);

print_r($scoreBoard->getSummary($manager->getActiveGamesCollection()));

$manager->finishGame($game1);
$manager->finishGame($game2);
```

### Testing
Tests are written using PHPUnit and snake notation for more for greater readability. To run the tests, use the following command:
```bash
cp phpunit.xml.dist phpunit.xml
composer test
```

### Author
Pawel Roguski [kontakt@pawelroguski.pl](mailto:kontakt@pawelroguski.pl?subject=[GitHub]%20FootballWorldCup)

### License
This project is licensed under the GNU General Public License. See the LICENSE file for more details.
