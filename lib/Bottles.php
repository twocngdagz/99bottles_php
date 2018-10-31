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
    return
      ucfirst($this->quantity($number)) .
      " {$this->container($number)} of beer on the wall, " .
      "{$this->quantity($number)} {$this->container($number)} of beer.\n" .
      "{$this->action($number)}, " .
      "{$this->quantity($this->successor($number))} " .
      "{$this->container($this->successor($number))} " .
      "of beer on the wall.\n";
  }

  public function container($number) {
    return (new BottleNumber($number))->container();
  }

  public function quantity($number) {
    return (new BottleNumber($number))->quantity();
  }

  public function action($number) {
    return (new BottleNumber($number))->action();
  }

  public function pronoun($number) {
    return (new BottleNumber($number))->pronoun();
  }

  public function successor($number) {
    return (new BottleNumber($number))->successor($number);
  }
}

class BottleNumber {
  protected $number;

  public function __construct($number) {
    $this->number = $number;
  }

  public function container() {
    if ($this->number === 1) {
      return "bottle";
    } else {
      return "bottles";
    }
  }

  public function quantity() {
    if ($this->number === 0) {
      return 'no more';
    } else {
      return (string)$this->number;
    }
  }

  public function action() {
    if ($this->number === 0) {
      return 'Go to the store and buy some more';
    } else {
      return "Take {$this->pronoun()} down and pass it around";
    }
  }

  public function pronoun($number) {
    if ($this->number === 1) {
      return 'it';
    } else {
      return 'one';
    }
  }

  public function successor($number) {
    if ($number === 0) {
      return 99;
    } else {
      return $number - 1;
    }
  }
}
