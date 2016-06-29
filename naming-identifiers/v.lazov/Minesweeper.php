<?php

namespace Minesweaper;

class Ranking {
  private $name;

  private $points;

  /**
   * Ranking constructor.
   *
   * @param $name
   * @param $points
   */
  public function __construct($name, $points) {
    $this->name = $name;
    $this->points = $points;
  }

  /**
   * @return mixed
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @param $name
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function getPoints() {
    return $this->points;
  }

  /**
   * @param $points
   */
  public function setPoints($points) {
    $this->points = $points;
  }
}

/**
 * 
 */
function main() {
  $command = '';
  $board = assemble_board();
  $bombs = place_bombs();
  $counter = 0;
  $dead = FALSE;
  $champions = [];
  $row = 0;
  $column = 0;
  $start_flag = TRUE;
  $max_points = 35;
  $new_champ = FALSE;

  do {
    if ($start_flag) {
      echo("Lets play “Minesweaper”. "
        . "Try your luck and find the fields without mines. "
        . "Commands: \n
                'top' - shows ranking; \n
                'restart' - starts a new game; \n
                'exit' - exits the game;");
      draw_board($board);
      $start_flag = FALSE;
    }

    echo("Enter row and column: ");
    // $line = fgets(STDIN);
    $command = '00';// user input here ... e.g. Console.ReadLine().Trim();
    if (count($command) >= 3) {
      $row = $command[0];
      $column = $command[1];
      if ((int) $row > 0 && (int) $column > 0 &&
        $row <= count($board[0]) && $column <= count($board)
      ) {
        $command = "turn";
      }
    }

    switch ($command) {
      case "top":
        ranking($champions);
        break;
      case "restart":
        $board = assemble_board();
        $bombs = place_bombs();
        draw_board($board);
        $dead = FALSE;
        $start_flag = FALSE;
        break;
      case "exit":
        echo("Bye!");
        break;
      case "turn":

        if ($bombs[$row][$column] != '*') {
          if ($bombs[$row][$column] == '-') {
            take_turn($board, $bombs, $row, $column);
            $counter++;
          }

          if ($max_points == $counter) {
            $new_champ = TRUE;
          }
          else {
            draw_board($board);
          }
        }
        else {
          $dead = TRUE;
        }

        break;
      default:
        echo("\n");
        echo("Error! Invalid command!");
        echo("\n");
        break;
    }

    if ($dead) {
      draw_board($bombs);
      echo("\n");
      echo("Hrrrrrr! You died heroicly with {$counter} points. Type your nickname: ");
      $nickname = "Victor Lazov"; // User generated input ... e.g. Console.ReadLine();
      $ranking = new Ranking($nickname, $counter);
      if (count($champions) < 5) {
        $champions[] = $ranking;
      }
      else {
        for ($i = 0; $i < count($champions); $i++) {
          if ($champions[$i]->getPoints() < $ranking->getPoints()) {
            $champions = array_splice($champions, $i, 0, $ranking);
            break;
          }
        }
      }

      // sort the champs ... no thanks :)

      //shampion4eta.Sort((zaKlasiraneto r1, zaKlasiraneto r2) => r2.igra4.CompareTo(r1.igra4));
      //shampion4eta.Sort((zaKlasiraneto r1, zaKlasiraneto r2) => r2.kolko.CompareTo(r1.kolko));

      ranking($champions);

      $board = assemble_board();
      $bombs = place_bombs();
      $counter = 0;
      $dead = FALSE;
      $start_flag = TRUE;
    }

    if ($new_champ) {
      echo("\n");
      echo("YES! Let Jesus fuck you.");
      draw_board($bombs);
      echo("Type your nickname: ");
      $nickname = "Victor Lazov"; // User generated input ... e.g. Console.ReadLine();
      $ranking = new Ranking($nickname, $counter);
      $champions[] = $ranking;
      ranking($champions);
      $board = assemble_board();
      $bombs = place_bombs();
      $counter = 0;
      $new_champ = FALSE;
      $start_flag = TRUE;
    }
  } while ($command != "exit");

  // User generated input for the command
  // Console.ReadLine();
}

/**
 *
 *
 * @param array $rankingItems - An array of objects of type Ranking.
 */
function ranking($rankingItems) {
  echo ("\n");
  echo ("Ranking");
  echo ("\n");

  if (count($rankingItems) > 0) {
    for ($i = 0; $i < count($rankingItems); $i++) {
      $rank = $i + 1;
      $player = $rankingItems[$i]->getName();
      $points = $rankingItems[$i]->getPoints();
      echo ("{$rank}. {$player} --> {$points} boxes");
    }

    echo ("\n");
  }
  else {
      echo ("Empty ranking!\n");
  }
}

/**
 *
 *
 * @param array $field
 * @param array $bombs
 * @param int $row
 * @param int $column
 */
function take_turn(&$field, &$bombs, $row, $column) {
    $bombNumber = kolko($bombs, $row, $column);
    $bombs[$row][$column] = $bombNumber;
    $field[$row][$column] = $bombNumber;
}

/**
 * @param array $board
 */
function draw_board($board) {
  $height = count($board);
  $length = count($board[0]);

  echo ("\n");
  echo ("    0 1 2 3 4 5 6 7 8 9");
  echo ("   ---------------------");

  for ($i = 0; $i < $length; $i++) {
    echo ("{$i} | ");
    for ($j = 0; $j < $height; $j++) {
      echo ("{$board[$i][$j]} ");
    }

    echo ("|\n");
  }

  echo ("   ---------------------");
  echo ("\n");
}

/**
 *
 * @return array
 */
function assemble_board() {
  $boardRows = 5;
  $boardColumns = 10;
  $board = [];

  for ($i = 0; $i < $boardRows; $i++) {
    for ($j = 0; $j < $boardColumns; $j++){
      $board[$i][$j] = '?';
    }
  }

  return $board;
}

/**
 *
 *
 * @return array
 */
function place_bombs() {
  $rows = 5;
  $columns = 10;
  $board = [];

  for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
      $board[$i][$j] = '-';
    }
  }

  $randoms = [];
  while (count($randoms) < 15) {
    $random = rand(0, 50);

    if (!in_array($random, $randoms)) {
      array_push($randoms, $random);
    }
  }

  foreach ($randoms as $rand_key => $rand_val) {
    $current_col = $rand_val / $columns;
    $current_row = $rand_val % $columns;

    if ($current_row == 0 && $rand_val != 0) {
      $current_col--;
      $current_row = $columns;
    }
    else {
      $current_row++;
    }

    $board[$current_col][$current_row - 1] = '*';
  }

  return $board;
}

/*
 * This function is never used ... nevertheless
 *
function smetki($board)
{
  $height = count($board);
  $length = count($board[0]);

  for ($i = 0; $i < $height; $i++) {
    for ($j = 0; $j < $length; $j++) {
      if (pole[i, j] != '*') {
        $bomb_number = get_bomb_number($board, $i, $j);
        $pole[$i][$j] = $bomb_number;
      }
    }
  }
}
*/


function get_bomb_number($board, $x, $y) {
  $total = 0;
  $rows = count($board[0]);
  $cols = count($board);

  if ($x - 1 >= 0) {
    if ($board[$x - 1][$y] == '*') {
      $total++;
    }
  }

  if ($x + 1 < $rows) {
    if ($board[$x + 1][$y] == '*') {
      $total++;
    }
  }

  if ($y - 1 >= 0) {
    if ($board[$x][$y - 1] == '*') {
      $total++;
    }
  }

  if ($y + 1 < $cols) {
    if ($board[$x][$y + 1] == '*') {
      $total++;
    }
  }

  if (($x - 1 >= 0) && ($y - 1 >= 0)) {
    if ($board[$x - 1][$y - 1] == '*') {
      $total++;
    }
  }

  if (($x - 1 >= 0) && ($y + 1 < $cols)) {
    if ($board[$x - 1][$y + 1] == '*') {
      $total++;
    }
  }

  if (($x + 1 < $rows) && ($y - 1 >= 0)) {
    if ($board[$x + 1][$y - 1] == '*') {
      $total++;
    }
  }

  if (($x + 1 < $rows) && ($y + 1 < $cols)) {
    if ($board[$x + 1][$y + 1] == '*') {
      $total++;
    }
  }

  return $total;
}
