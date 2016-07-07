<?php

namespace Minesweeper;

class RankList {
  
  private $name;
  
  private $points;
  
  public function $getName() {
    return $this->$name;
  }
  
  public function $setName(){
    return $this->$name;
  }
  
  public function $getPoints(){
    return $this->$points;
  }
  
  public function $setPoints(){
    return $this->$points;
  }
  
  public function __construct($name, $points){
    $name = $this->$name;
    $points = $this->$points;
  }
}

function main(){
  $command = '';
  $field = create_field();
  $mines = place_mines();
  $counter = 0;
  $explosion = false;
  $champions = array();
  $row = 0;
  $col = 0;
  $start_flag = true;
  $max_points = 35;
  $end_flag = false;

  do{
    if($start_flag){
      echo ("Let's play Minesweeper. Try your luck and find the fields without mines.".
          ."Commands: \n
            'top' - shows ranking list, \n
            'restart' - starts a new game, \n
            'exit' - quit game");
      draw_field($field);
      $start_flag = false;
    }
    
    echo "Enter row and column: ";
    
    $command = '0';
    if(count($command) >= 3){
      $row = $command[0];
      $col = $command[2];
      if($row > 0 && $col > 0 && 
        $row <= count($field[0]) && $col <= count($field)){
        $command = "turn";
      }
    }
  
  
    switch ($command){
      case "top":
        $counter($champions);
        break;

      case "restart":
        $field = create_field();
        $mines = place_mines();
        draw_field($field);
        $explosion = false;
        $start_flag = false;
        break;

      case "exit":
        echo "Good bye!";
        break;

      case "turn":
        if ($mines[$row, $col] != '*'){
          if ($mines[$row, $col] == '-'){
            your_turn($field, $mines, $row, $col);
            $counter++;
          }

          if ($max_points == $counter){
            $end_flag = true;
          }
          else {
            draw_field($field);
          }
        }
        else{
          $explosion = true;
        }

        break;

      default:
        echo "Error! The command is incorrect!"
        break;
    }

    if ($explosion) {
      draw_field($field);

      echo "Hrrrrrr1 You heroecly died with ". $counter ." points. Please, enter your nickname: ";

      $nickname = "";

      $ranking = new Ranking($nickname, $counter);

      if (counter($champions) < 5) {
        $champions[] = $ranking;
      }
      else {
        for ($i = 0;$i < counter($champions);i++) {
          if ($champions[$i]->$getPoints() < $ranking->$getPoints()) {
            $champions = array_slice($champions, $i, $ranking)
            break;
          }
        }
      }

      // sort()

      $name_sorting = asort($ranking, $ranking->$getName());
      $position_sorting = asort($ranking, $ranking->$getPoints());

      $ranking($champions);

      $field = create_field();
      $mines = place_mines();
      $counter = 0;
      $explosion = false;
      $start_flag = true;
    }

    if($end_flag){
      echo "Congratulations! You have opened all the fields successfully!"
      draw_field($field);
      echo "Please, enter your nickname: ";
      $nickname = "";
      $ranking = new Ranking($nickname, $counter);
      $champions[] = $ranking;
      $field = create_field();
      $mines = place_mines();  
      $counter = 0;
      $end_flag =  false;
      $start_flag = true;
    }
  } while ($command != "exit");
}

function ranking($ranking_points){
  echo "Ranking points";
  
  if(count($ranking_points) > 0){
    for($i = 0; $i < count($ranking_points); $i++){
      $player = $ranking_points[$i]->getName;
      $points = $ranking_points[$i]->getPoints;
      echo "Boxes ". $player . ", " . $points;
    }
  } 
  else {
    echo "Rank list is empty";
  }
}

function your_turn($field, $mines, $row, $col){
  $mines_number = mines_number($mines, $row, $col);
  $mines[$row][$col] = $mines_number;
  $field[$row][$col] = $mines_number;
}

function draw_field($field){
  $width = count($field);
  $height = count($field[0]);
  
  echo "\n    0 1 2 3 4 5 6 7 8 9";
  echo "   ---------------------";

  for($i = 0; $i<$height; $i++){
    echo $i;
    for($j = 0; $j< $width; $j++){
      echo $field[$i][$j];
    }
  }
  echo "   ---------------------";
}

function create_field(){
  $rows = 5;
  $cols = 10;
  $field = array();
  
  for($i = 0; $i < $rows; $i++){
    for($j=0; $j <$cols; $j++){
      $field[$i][$j];
    }
  }
  return $field;
}

function place_mines(){
  $rows = 5;
  $cols = 10;
  $field = array();
  
  for($i = 0; $i < $rows; $i++){
    for($j=0; $j <$cols; $j++){
      $field[$i][$j];
    }
  }  
  
  $something = array();
  
  while(count($something) < 15){
    $random = rand(0, 50);
    if(!isset($random)){
    array_push($something, $random);
    }
  }
  
  foreach ($something as $key => $value){
    $column = $value / $cols;
    $row = $value % $rows;
    
    if($row == 0 && $value != 0){
      $column--;
      $row = $cols;
    }
    else {
      $row++;
    }
    
    $field[$column][$row - 1] = '*';
  }
  return $field;
}

function calculating($field){
  $cols = count($field);
  $rows = count($field[0]);
  
  for ($i = 0; $i < $cols; $i++) {
    for ($j = 0; $j < $rows; $j++) {
      if ($field[$i][$j] != '*') {
        $something = $unknown($field, $i, $j);
        $field[$i][$j] = $something;
      }
    }
  }
}