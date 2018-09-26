<?php

class Bottles {
  public function song() {
    return $this->verses(99, 0);
  }

  public function verses($starting, $ending) {
    $verses = [];
    foreach (range($starting, $ending) as $number) {
      $verses[] = $this->verse($number);
    }

    return implode("\n", $verses);
  }

  public function verse($number) {
    switch ($number) {
      case 0:
        return
          ucfirst($this->quantity($number)) .
          " {$this->container($number)} of beer on the wall, " .
          "{$this->quantity($number)} {$this->container($number)} of beer.\n" .
          "{$this->action($number)}, " .
          "99 bottles of beer on the wall.\n";
      default:
        return
          ucfirst($this->quantity($number)) .
          " {$this->container($number)} of beer on the wall, " .
          "{$this->quantity($number)} {$this->container($number)} of beer.\n" .
          "{$this->action($number)}, " .
          "{$this->quantity($number - 1)} " .
          "{$this->container($number - 1)} " .
          "of beer on the wall.\n";
    }
  }

  public function action($number) {
    if ($number === 0) {
      return 'Go to the store and buy some more';
    } else {
      return "Take {$this->pronoun($number)} down and pass it around";
    }
  }

  public function quantity($number) {
    if ($number === 0) {
      return 'no more';
    } else {
      return (string)$number;
    }
  }

  public function pronoun($number) {
    if ($number === 1) {
      return 'it';
    } else {
      return 'one';
    }
  }

  public function container($number) {
    if ($number === 1) {
      return "bottle";
    } else {
      return "bottles";
    }
  }
}
