<?php

class Bottles
{
    public function song()
    {
        return $this->verses(99, 0);
    }

    public function verses($starting, $ending)
    {
        return implode(
            "\n",
            array_map(
                function ($number) {
                    return $this->verse($number);
                },
                range($starting, $ending, -1)
            )
        );
    }

    public function verse($number)
    {
        switch ($number) {
            case 0:
                return "No more bottles of beer on the wall, " .
                    "no more bottles of beer.\n" .
                    "Go to the store and buy some more, " .
                    "99 bottles of beer on the wall.\n";
            case 1:
                return "1 bottle of beer on the wall, " .
                    "1 bottle of beer.\n" .
                    "Take it down and pass it around, " .
                    "no more bottles of beer on the wall.\n";
            case 2:
                return "2 bottles of beer on the wall, " .
                    "2 bottles of beer.\n" .
                    "Take one down and pass it around, " .
                    "1 bottle of beer on the wall.\n";
            case 6:
                return "1 six-pack of beer on the wall, " .
                    "1 six-pack of beer.\n" .
                    "Take one down and pass it around, " .
                    "5 bottles of beer on the wall.\n";
            case 7:
                return "7 bottles of beer on the wall, " .
                    "7 bottles of beer.\n" .
                    "Take one down and pass it around, " .
                    "1 six-pack of beer on the wall.\n";
            default:
                return "{$number} bottles of beer on the wall, " .
                    "{$number} bottles of beer.\n" .
                    "Take one down and pass it around, " .
                    ($number - 1) . " bottles of beer on the wall.\n";
        }
    }
}
