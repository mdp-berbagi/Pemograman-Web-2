<?php

/**
 * Checker Version Of PHP
 * PHP Varsi 7.4 harus
 */
$versi = explode(".", phpversion());
if((int) $versi[0].$versi[1] < 74) {
    exit("Versi PHP {$versi[0]}.{$versi[1]} tidak didukung, yang didukung adalah 7.4 keatas");
}