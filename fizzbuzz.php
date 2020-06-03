<?php
class FizzBuzz
{
  public function generate(int $limit): void
  {
    for ($number = 1; $number <= $limit; $number++) {
      if ($number % 3 === 0 && $number % 5 === 0) {
        echo "FizzBuzz\n";
      }
      if ($number % 3 === 0) {
        echo "Fizz \n";
      }
      if ($number % 5 === 0) {
        echo "Buzz\n";
      }
      echo "$number \n";
    }
  }
}

$fizzBuzz = new FizzBuzz();
$fizzBuzz->generate(100);
