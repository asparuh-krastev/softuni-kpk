<?php
namespace MinichkiGame;

use OtherPackage;
use OtherPackage\ClassName;

class PlayMinichkiGame
{
    const MAX_FIELDS = 35;

    /**
    * Short description of property here (if needed).
    *
    * @var string
    */
    private $name;
    private $points;
    public $player;
    public $getPoints;

    public function __construct(string $name, int $points) {
        $this->name;
        $this->points;
    }

    public function getName {
        return $this->name;
    }

    /**
     * Sets the ...(short description)
     *
     * @param $newName {string}
     *
     * @return {string} ...
     */
    public function setName($newName) {
        $this->name = $newName;
    }

    public function getPoints {
        return $this->points;
    }

    public function setPoints($newPoints) {
        $this->name = $newPoints;
    }

    function startGame(string $player) {
        $flag = true;

        if ($flag) {
            echo "Hajde da igraem na \"Mini4KI\". Probvaj si kasmeta da otkriesh " .
                "poleteta bez mini4ki. Komanda 'top' pokazva klasiraneto, 'restart' " .
                "po4va nova igra, 'exit' izliza i hajde 4ao!";

            $flag = false;
        }
        else {
            echo "Daj red i kolona : ";
        }

        $champions = new Champions();
        $terrain = [];
        $bombs = [];
        $command = "Console ReadLine Trim";
        $row = 0;
        $column = 0;
        $counter = 0;
        $innerFlag = false;
        $grum = false;

        switch ($command) {
            case "top":
                classificateTeam($champions);
                break;
            case "restart":
                $terrain = createTerrain();
                $bombs = $createBombs();
                $grum = false;
                $flag = false;
            case "exit":
                echo "4a0, 4a0, 4a0!";
                break;
            case "turn":
                // Those statements might be good to be out of 'switch' structure, dependent on scope of the business logic.
                if ($bombs[$row, $column] != '*') {
                    if ($bombs[$row, $column] == '-') {
                        playerMovement($terrain, $bombs, $row, $column);
                        $counter++;
                    }
                }

                if (MAX_FIELDS == $counter) {
                    $innerFlag = true;
                }
                else {
                    echo '<pre>' . print_r($terrain, true) . '</pre>';
                    $grum = true;
                }
                break;
            default:
                echo "\nGreshka! nevalidna Komanda\n";
                break;
        }
   }

   // ToDo: Finish the rest given code...
}
