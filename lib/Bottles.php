<?php

class Bottles
{
    public function song()
    {
        return $this->verses(99, 0);
    }

    public function verses($start, $ending)
    {
        return implode("\n", array_map(function ($index) {
            return $this->verse($index);
        }, range($start, $ending)));
    }

    public function verse($number)
    {
        return
            ($number == 0 ? "No more" : $number)." bottle".($number != 1 ? 's' : '')." of beer on the wall, ".
            ($number == 0 ? "no more" : $number)." bottle".($number != 1 ? 's' : '')." of beer.\n".
            ($number > 0 ? "Take ".($number > 1 ? 'one' : 'it')." down and pass it around, " : "Go to the store and buy some more, ").
            ($number - 1 < 0 ? 99 : ($number - 1 == 0 ? 'no more' : $number - 1))." bottle".($number - 1 != 1 ? 's' : '')." of beer on the wall.\n";
    }
}