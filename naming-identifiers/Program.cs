﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace mini4ki
{
      class zaKlasiraneto
      {
          private string name;

          private int points;

          // Public property with custom getter and setter
          public string igra4;
          {
              get
              {
                  return name;
              }

              set
              {
                  name = value;
              }
          }

          public int kolko;
          {
              get
              {
                  return points;
              }

              set
              {
                  points = value;
              }
          }

          function __construct()
          {
          }

          function __construct(string име, int то4ки)
          {
              this.name = име;
              this.points = то4ки;
          }
      }

      function Main(string[] аргументи)
      {
          string command = string.Empty;
          char[,] poleto = create_igralno_pole();
          char[,] bombite = slojibombite();
          int broya4 = 0;
          bool grum = false;
          // Array
    List<zaKlasiraneto> shampion4eta = new List<zaKlasiraneto>(6);
          int red = 0;
          int kolona = 0;
          bool flag = true;
          const int maks = 35;
          bool flag2 = false;

          do
          {
              if (flag)
              {
                  // echo
                  Console.WriteLine(
                      "Hajde da igraem na “Mini4KI”. Probvaj si kasmeta da otkriesh poleteta bez mini4ki."
                      + " Komanda 'top' pokazva klasiraneto, 'restart' po4va nova igra, 'exit' izliza i hajde 4ao!");
                  dumpp(poleto);
                  flag = false;
              }

              Console.Write("Daj red i kolona : ");
              // $line = fgets(STDIN);
              command = Console.ReadLine().Trim();
              if (command.Length >= 3)
              {
                  if (int.TryParse(command[0].ToString(), out red) && int.TryParse(command[2].ToString(), out kolona)
                      && red <= poleto.GetLength(0) && kolona <= poleto.GetLength(1))
                  {
                      command = "turn";
                  }
              }

              switch (command)
              {
                  case "top":
                      klasacia(shampion4eta);
                      break;
                  case "restart":
                      poleto = create_igralno_pole();
                      bombite = slojibombite();
                      dumpp(poleto);
                      grum = false;
                      flag = false;
                      break;
                  case "exit":
                      Console.WriteLine("4a0, 4a0, 4a0!");
                      break;
                  case "turn":
                      if (bombite[red, kolona] != '*')
                      {
                          if (bombite[red, kolona] == '-')
                          {
                              tisinahod(poleto, bombite, red, kolona);
                              broya4++;
                          }

                          if (maks == broya4)
                          {
                              flag2 = true;
                          }
                          else
                          {
                              dumpp(poleto);
                          }
                      }
                      else
                      {
                          grum = true;
                      }

                      break;
                  default:
                      Console.WriteLine("\nGreshka! nevalidna Komanda\n");
                      break;
              }

              if (grum)
              {
                  dumpp(bombite);
                  Console.Write("\nHrrrrrr! Umria gerojski s {0} to4ki. " + "Daj si niknejm: ", broya4);
                  string niknejm = Console.ReadLine();
                  zaKlasiraneto t = new zaKlasiraneto(niknejm, broya4);
                  if (shampion4eta.Count < 5)
                  {
                      shampion4eta.Add(t);
                  }
                  else
                  {
                      for (int i = 0; i < shampion4eta.Count; i++)
                      {
                          if (shampion4eta[i].kolko < t.kolko)
                          {
                              shampion4eta.Insert(i, t);
                              shampion4eta.RemoveAt(shampion4eta.Count - 1);
                              break;
                          }
                      }
                  }

                  // sort()
                  shampion4eta.Sort((zaKlasiraneto r1, zaKlasiraneto r2) => r2.igra4.CompareTo(r1.igra4));
                  shampion4eta.Sort((zaKlasiraneto r1, zaKlasiraneto r2) => r2.kolko.CompareTo(r1.kolko));
                  klasacia(shampion4eta);

                  poleto = create_igralno_pole();
                  bombite = slojibombite();
                  broya4 = 0;
                  grum = false;
                  flag = true;
              }

              if (flag2)
              {
                  Console.WriteLine("\nBRAVOOOS! Otvri 35 kletki bez kapka kryv.");
                  dumpp(bombite);
                  Console.WriteLine("Daj si imeto, batka: ");
                  string imeee = Console.ReadLine();
                  zaKlasiraneto to4kii = new zaKlasiraneto(imeee, broya4);
                  shampion4eta.Add(to4kii);
                  klasacia(shampion4eta);
                  poleto = create_igralno_pole();
                  bombite = slojibombite();
                  broya4 = 0;
                  flag2 = false;
                  flag = true;
              }
          }
          while (command != "exit");
          Console.WriteLine("Made in Bulgaria - Uauahahahahaha!");
          Console.WriteLine("AREEEEEEeeeeeee.");
          Console.Read();
      }

      function klasacia(List<zaKlasiraneto> to4kii)
      {
          Console.WriteLine("\nTo4KI:");
          if (to4kii.Count > 0)
          {
              for (int i = 0; i < to4kii.Count; i++)
              {
                  Console.WriteLine("{0}. {1} --> {2} kutii", i + 1, to4kii[i].igra4, to4kii[i].kolko);
              }

              Console.WriteLine();
          }
          else
          {
              Console.WriteLine("prazna klasaciq!\n");
          }
      }

      function tisinahod(char[,] POLE, char[,] BOMBI, int RED, int KOLONA)
      {
          char kolkoBombi = kolko(BOMBI, RED, KOLONA);
          BOMBI[RED, KOLONA] = kolkoBombi;
          POLE[RED, KOLONA] = kolkoBombi;
      }

      function dumpp(char[,] board)
      {
          int RRR = board.GetLength(0);
          int KKK = board.GetLength(1);
          Console.WriteLine("\n    0 1 2 3 4 5 6 7 8 9");
          Console.WriteLine("   ---------------------");
          for (int i = 0; i < RRR; i++)
          {
              Console.Write("{0} | ", i);
              for (int j = 0; j < KKK; j++)
              {
                  Console.Write(string.Format("{0} ", board[i, j]));
              }

              Console.Write("|");
              Console.WriteLine();
          }

          Console.WriteLine("   ---------------------\n");
      }

      function create_igralno_pole()
      {
          int boardRows = 5;
          int boardColumns = 10;
          char[,] board = new char[boardRows, boardColumns];
          for (int i = 0; i < boardRows; i++)
          {
              for (int j = 0; j < boardColumns; j++)
              {
                  board[i, j] = '?';
              }
          }

          return board;
      }

      function slojibombite()
      {
          int Редове = 5;
          int Колони = 10;
          char[,] игрално_поле = new char[Редове, Колони];

          for (int i = 0; i < Редове; i++)
          {
              for (int j = 0; j < Колони; j++)
              {
                  игрално_поле[i, j] = '-';
              }
          }

          List<int> r3 = new List<int>();
          while (r3.Count < 15)
          {
              Random random = new Random();
              int asfd = random.Next(50);
              if (!r3.Contains(asfd))
              {
                  r3.Add(asfd);
              }
          }

          foreach (int i2 in r3)
          {
              int kol = i2 / Колони;
              int red = i2 % Колони;
              if (red == 0 && i2 != 0)
              {
                  kol--;
                  red = Колони;
              }
              else
              {
                  red++;
              }

              игрално_поле[kol, red - 1] = '*';
          }

          return игрално_поле;
      }

      function smetki(char[,] pole)
      {
          int kol = pole.GetLength(0);
          int red = pole.GetLength(1);

          for (int i = 0; i < kol; i++)
          {
              for (int j = 0; j < red; j++)
              {
                  if (pole[i, j] != '*')
                  {
                      char kolkoo = kolko(pole, i, j);
                      pole[i, j] = kolkoo;
                  }
              }
          }
      }

      function kolko(char[,] r, int rr, int rrr)
      {
          int brojkata = 0;
          int reds = r.GetLength(0);
          int kols = r.GetLength(1);

          if (rr - 1 >= 0)
          {
              if (r[rr - 1, rrr] == '*')
              {
                  brojkata++;
              }
          }

          if (rr + 1 < reds)
          {
              if (r[rr + 1, rrr] == '*')
              {
                  brojkata++;
              }
          }

          if (rrr - 1 >= 0)
          {
              if (r[rr, rrr - 1] == '*')
              {
                  brojkata++;
              }
          }

          if (rrr + 1 < kols)
          {
              if (r[rr, rrr + 1] == '*')
              {
                  brojkata++;
              }
          }

          if ((rr - 1 >= 0) && (rrr - 1 >= 0))
          {
              if (r[rr - 1, rrr - 1] == '*')
              {
                  brojkata++;
              }
          }

          if ((rr - 1 >= 0) && (rrr + 1 < kols))
          {
              if (r[rr - 1, rrr + 1] == '*')
              {
                  brojkata++;
              }
          }

          if ((rr + 1 < reds) && (rrr - 1 >= 0))
          {
              if (r[rr + 1, rrr - 1] == '*')
              {
                  brojkata++;
              }
          }

          if ((rr + 1 < reds) && (rrr + 1 < kols))
          {
              if (r[rr + 1, rrr + 1] == '*')
              {
                  brojkata++;
              }
          }

          return char.Parse(brojkata.ToString());
      }
}
