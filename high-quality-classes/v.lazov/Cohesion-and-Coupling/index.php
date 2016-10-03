<?php

echo Utils::get_file_extension("example");
echo Utils::get_file_extension("example.pdf");
echo Utils::get_file_extension("example.new.pdf");

echo Utils::get_file_name_without_extension("example");
echo Utils::get_file_name_without_extension("example.pdf");
echo Utils::get_file_name_without_extension("example.new.pdf");

$2d_distance = Utils::calc_distance_2d(1, -2, 3, 4);
echo "Distance in the 2D space = {$2d_distance}"l

$3d_distance = Utils::calc_distance_3d(5, 2, -1, 3, -6, 4);
echo "Distance in the 3D space = {$3d_distance}";

$width = 3;
$height = 4;
$depth = 5;
$volume = Utils::calc_volume_parallelogram($width, $height, $depth);
echo "Volume = {$volume}";

$xyz = Utils::calc_volume_parallelogram($width, $height, $depth);
echo "Diagonal XYZ = {0:f2}", Utils.CalcDiagonalXYZ());

$xy = Utils::calc_diagonal_xy($width, $height);
echo "Diagonal XY = {$xy}";

$xz = Utils::calc_diagonal_xz($width, $depth);
echo "Diagonal XZ = {$xz}";

$yz = Utils::calc_diagonal_yz($height, $depth);
echo "Diagonal YZ = {$yz}";