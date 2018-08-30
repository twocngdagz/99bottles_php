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
          "No more bottles of beer on the wall, " .
          "no more bottles of beer.\n" .
          "Go to the store and buy some more, " .
          "99 bottles of beer on the wall.\n";
      case 1:
        return
          "{$number} {$this->container($number)} of beer on the wall, " .
          "{$number} {$this->container($number)} of beer.\n" .
          "Take {$this->pronoun($number)} down and pass it around, " .
          "{$this->quantity()} bottles of beer on the wall.\n";
      default:
        return
          "{$number} {$this->container($number)} of beer on the wall, " .
          "{$number} {$this->container($number)} of beer.\n" .
          "Take {$this->pronoun($number)} down and pass it around, " .
          ($number - 1) . " {$this->container($number - 1)} " .
          "of beer on the wall.\n";
    }
  }

  private function quantity($number = 0) {
    if ($number === 0) {
      return 'no more';
    } else {
      return $number;
    }
  }

  private function pronoun($number) {
    if ($number === 1) {
      return 'it';
    } else {
      return 'one';
    }
  }

  private function container($number) {
    if ($number === 1) {
      return "bottle";
    } else {
      return "bottles";
    }
  }
}
