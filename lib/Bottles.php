<?php

class Bottles
{
    public function song()
    {
        return $this->verses(99, 0);
    }

    public function verses($bottlesAtStart, $bottlesAtEnd)
    {
        return implode(
            "\n",
            array_map(
                function ($bottles) {
                    return $this->verse($bottles);
                },
                range($bottlesAtStart, $bottlesAtEnd, -1)
            )
        );
    }

    public function verse($bottles)
    {
        return (string) new Round($bottles);
    }
}

class Round
{
    private $bottles;

    public function __construct($bottles)
    {
        $this->bottles = $bottles;
    }

    public function __toString()
    {
        return $this->challenge() . $this->response();
    }

    private function challenge()
    {
        return ucfirst($this->bottlesOfBeer()) . ' ' .
            $this->onWall() . ', ' . $this->bottlesOfBeer() . ".\n";
    }

    private function response()
    {
        return $this->goToTheStoreOrTakeOneDown() . ', ' .
            $this->bottlesOfBeer() . ' ' . $this->onWall() . ".\n";
    }

    private function bottlesOfBeer()
    {
        return "{$this->anglicizedBottleCount()} " .
            "{$this->pluralizedBottleForm()} of {$this->beer()}";
    }

    private function beer()
    {
        return 'beer';
    }

    private function onWall()
    {
        return 'on the wall';
    }

    private function pluralizedBottleForm()
    {
        return $this->lastBeer() ? 'bottle' : 'bottles';
    }

    private function anglicizedBottleCount()
    {
        return $this->allOut() ?
            'no more' : (string)$this->bottles;
    }

    private function goToTheStoreOrTakeOneDown()
    {
        if ($this->allOut()) {
            $this->bottles = 99;
            return $this->buyNewBeer();
        } else {
            $lyrics = $this->drinkBeer();
            $this->bottles--;
            return $lyrics;
        }
    }

    private function buyNewBeer()
    {
        return 'Go to the store and buy some more';
    }

    private function drinkBeer()
    {
        return "Take {$this->itOrOne()} down and pass it around";
    }

    private function itOrOne()
    {
        return $this->lastBeer() ? 'it' : 'one';
    }

    private function allOut()
    {
        return $this->bottles === 0;
    }

    private function lastBeer()
    {
        return $this->bottles === 1;
    }
}
