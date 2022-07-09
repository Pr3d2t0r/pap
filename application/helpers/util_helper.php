<?php

/**
 * Divide um array em varios e retorna esses arrays dentro de um array
 * @param $array
 * @param int $nItems
 * @return array
 */
function chunkArray($array, int $nItems=3): array
{
    $count = 0;
    $x = 0;
    $new_arr = [];
    for ($i = 0; $i < count($array); $i++) {
        if ($count == $nItems) {
            $count = 0;
            $x++;
        }
        $new_arr[$x][] = $array[$i];
        $count++;
    }
    return $new_arr;
}

/**
 * Divide um array em 2 partes e retorna esses arrays dentro de um array
 * @param $array
 * @return array
 */
function chunkArrayHalf($array): array
{
    $nItems = ceil(count($array)/2);
    return chunkArray($array, $nItems);
}