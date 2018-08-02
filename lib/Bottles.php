<?php

class Bottles
{
    public function song()
    {
        return $this->verses(99, 0);
    }

    private function verses($starting, $ending)
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

    private function verse($number)
    {
        switch ($number) {
            case 0:
                return ucfirst($this->quantity($number)) .
                    " bottles of beer on the wall, " .
                    "no more bottles of beer.\n" .
                    "Go to the store and buy some more, " .
                    "99 bottles of beer on the wall.\n";
            default:
                return ucfirst($this->quantity($number)) .
                    " {$this->container($number)} of beer on the wall, " .
                    "{$number} {$this->container($number)} of beer.\n" .
                    "Take {$this->pronoun($number)} down and pass it around, " .
                    "{$this->quantity($number - 1)} {$this->container($number - 1)}" .
                    " of beer on the wall.\n";
        }
    }

    private function quantity($number)
    {
        if ($number === 0) {
            return 'no more';
        } else {
            return $number;
        }
    }

    private function pronoun($number)
    {
        if ($number === 1) {
            return 'it';
        } else {
            return 'one';
        }
    }
    
    private function container($number)
    {
        if ($number === 1) {
            return "bottle";
        } else {
            return "bottles";
        }
    }
}
