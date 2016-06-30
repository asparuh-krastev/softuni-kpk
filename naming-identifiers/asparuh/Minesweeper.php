<?php

namespace Minesweeper;

define('MINES_COUNT', 15);
define('MAXIMUM_TURNS', 35);
define('BOARD_ROWS', 5);
define('BOARD_COLUMNS', 10);

class Player
{
    $name;

    $points;

    function __construct()
    {
    }

    function __construct($name, $points)
    {
        this.name = $name;
        this.points = $points;
    }
}

function Main()
{
    $command = '';
    $board = createBoard();
    $minePositions = placeMines();
    $turnCount = 0;
    $hasExploded = false;
    $players = array();
    $row = 0;
    $column = 0;
    $isGameStarted = false;
    $isFlawlessVictory = false;

    do
    {
        if (!$isGameStarted)
        {
            Console.WriteLine(
                "Let's play Minesweeper. Try to find the fields without mines."
                . " Enter 'top' to show the high scores, 'restart' to start a new game, 'exit' - you know!");
            printBoard(board);
            $isGameStarted = true;
        }

        echo("Enter [row,column] : ");
        $command = fgets(STDIN);
        if (strlen($command) >= 3)
        {
            list($row, $column) = explode(',', $command);
            if ($row <= BOARD_ROWS && $column <= BOARD_COLUMNS)
            {
                $command = "turn";
            }
        }

        switch ($command)
        {
            case "top":
                printScores($players);
                break;
            case "restart":
                $board = createBoard();
                $minePositions = placeMines();
                printBoard($board);
                $hasExploded = false;
                $isGameStarted = true;
                break;
            case "exit":
                echo("Goodbye!\n");
                break;
            case "turn":
                if ($minePositions[$row][$column] != '*')
                {
                    if ($minePositions[$row][$column] == '-')
                    {
                        playTurn($board, $minePositions, $row, $column);
                        $turnCount++;
                    }

                    if (MAXIMUM_TURNS == $turnCount)
                    {
                        $isFlawlessVictory = true;
                    }
                    else
                    {
                        printBoard($board);
                    }
                }
                else
                {
                    $hasExploded = true;
                }

                break;
            default:
                echo("\nWrong command\n");
                break;
        }

        if ($hasExploded)
        {
            printBoard(minePositions);
            echo("\nYou died with {$turnCount} points. Enter your nickname: ", $turnCount);
            $nickname = fgets(STDIN);
            $player = new Player($nickname, $turnCount);
            if (cout($players) < 5)
            {
                array_push($players, $player);
            }
            else
            {
                for ($i = 0; $i < cout($players); $i++)
                {
                    if ($players[$i].points < $player.points)
                    {
                        // TODO: PHP insert
                        $players.Insert($i, $player);
                        break;
                    }
                }
            }

            // TODO: PHP sort
            $players.Sort((Player r1, Player r2) => r2.player.CompareTo(r1.player));
            $players.Sort((Player r1, Player r2) => r2.kolko.CompareTo(r1.kolko));
            printScores($players);

            $board = createBoard();
            $minePositions = placeMines();
            $turnCount = 0;
            $hasExploded = false;
            $isGameStarted = false;
        }

        if ($isFlawlessVictory)
        {
            Console.WriteLine("\nGREAT JOB! You opened {MAXIMUM_TURNS} fields flawlessly.");
            printBoard($minePositions);
            echo("Enter you name champ: ");
            $nickname = fgets(STDIN);
            $player = new Player($nickname, $turnCount);
            array_push($players, $player);
            printScores($players);
            $board = createBoard();
            $minePositions = placeMines();
            $turnCount = 0;
            $isFlawlessVictory = false;
            $isGameStarted = false;
        }
    }
    while ($command != "exit");
    echo("Made in Bulgaria!!!");
    fgets(STDIN);
}

function printScores($players)
{
    echo("\nPoints:");
    if (count($players) > 0)
    {
        for (int i = 0; i < count($players); i++)
        {
            echo "{$players[i].name}. {$players[i].points} --> {i + 1} kutii";
        }

        echo("\n");
    }
    else
    {
        echo("Empty list!\n");
    }
}

function playTurn(&$board, &$minePositions, $row, $column)
{
    $minesCount = getMinesCount($minePositions, $row, $column);
    $minePositions[$row, $column] = $minesCount;
    $board[$row, $column] = $minesCount;
}

function printBoard($board)
{
    echo("\n    0 1 2 3 4 5 6 7 8 9");
    echo("   ---------------------");
    for ($i = 0; $i < BOARD_ROWS; $i++)
    {
        echo("{$i} | ");
        for ($j = 0; $j < BOARD_COLUMNS; $j++)
        {
            echo("{$board[$i][$j]} ");
        }

        echo("|\n");
    }

    echo("   ---------------------\n");
}

function createBoard()
{
    $board = array();
    for ($i = 0; $i < BOARD_ROWS; $i++)
    {
        for ($j = 0; $j < BOARD_COLUMNS; $j++)
        {
            $board[i][j] = '?';
        }
    }

    return $board;
}

function placeMines()
{
    $board = array();

    for ($i = 0; $i < BOARD_ROWS; $i++)
    {
        for ($j = 0; $j < BOARD_COLUMNS; $j++)
        {
            $board[$i][$j] = '-';
        }
    }

    $minePositions = array();
    for ($i = 0; $i < MINES_COUNT; $i++)
    {
        $position = rand(0, BOARD_ROWS * BOARD_COLUMNS);
        if (FALSE === array_search($position, $minePositions))
        {
            array_push($minePositions, $position);
        }
    }

    foreach ($minePositions as $position)
    {
        $column = $position / BOARD_COLUMNS;
        $row = $position % BOARD_COLUMNS;
        if ($row == 0 && $position != 0)
        {
            $column--;
            $row = $columns;
        }
        else
        {
            $row++;
        }

        $board[$column][$row - 1] = '*';
    }

    return $board;
}

function calculateMinesCount(&$board)
{
    $row = BOARD_ROWS;
    $column = BOARD_COLUMNS;

    for ($i = 0; $i < $row; $i++)
    {
        for ($j = 0; $j < $column; $j++)
        {
            if ($board[$i][$j] != '*')
            {
                $minesCount = getMinesCount($board, $i, $j);
                $board[$i][$j] = $minesCount;
            }
        }
    }
}

function getMinesCount($board, $row, $column)
{
    int $count = 0;

    if ($row - 1 >= 0)
    {
        if ($board[$row - 1, $column] == '*')
        {
            $count++;
        }
    }

    if ($row + 1 < BOARD_ROWS)
    {
        if ($board[$row + 1, $column] == '*')
        {
            $count++;
        }
    }

    if ($column - 1 >= 0)
    {
        if ($board[$row, $column - 1] == '*')
        {
            $count++;
        }
    }

    if ($column + 1 < BOARD_COLUMNS)
    {
        if ($board[$row, $column + 1] == '*')
        {
            $count++;
        }
    }

    if (($row - 1 >= 0) && ($column - 1 >= 0))
    {
        if ($board[$row - 1, $column - 1] == '*')
        {
            $count++;
        }
    }

    if (($row - 1 >= 0) && ($column + 1 < BOARD_COLUMNS))
    {
        if ($board[$row - 1, $column + 1] == '*')
        {
            $count++;
        }
    }

    if (($row + 1 < BOARD_ROWS) && ($column - 1 >= 0))
    {
        if ($board[$row + 1, $column - 1] == '*')
        {
            $count++;
        }
    }

    if (($row + 1 < BOARD_ROWS) && ($column + 1 < BOARD_COLUMNS))
    {
        if ($board[$row + 1, $column + 1] == '*')
        {
            $count++;
        }
    }

    return $count;
}
