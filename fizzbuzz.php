<?php
class FizzBuzz
{
  public function generate(int $limit): void
  {
    for ($number = 1; $number <= $limit; $number++) {
      if ($number % 3 === 0 && $number % 5 === 0) {
        echo "FizzBuzz\n";
      } else if ($number % 3 === 0) {
        echo "Fizz \n";
      } else if ($number % 5 === 0) {
        echo "Buzz\n";
      } else {
        echo "$number \n";
      }
    }
  }
}

$fizzBuzz = new FizzBuzz();
$fizzBuzz->generate(100);

// Change in requirement to Okay, handle multiples of 7 such that if a number is a multiple of 7, output Bazz.for a multiple of 7 AND 3,  output FizzBazz, for a multiple of 7 AND 5, output BuzzBazz

class FizzBuzzBazz
{
  public function generate(int $limit): void
  {
    for ($number = 1; $number <= $limit; $number++) {
      if ($number % 3 === 0 &&  $number % 5 === 0 && $number % 7 === 0) {
        echo "FizzBuzzBazz\n";
      } else if ($number % 3 === 0 && $number % 5 === 0) {
        echo "FizzBuzz\n";
      } else if ($number % 3 === 0 &&  $number % 7 === 0) {
        echo "FizzBazz\n";
      } else if ($number % 5 === 0 && $number % 7 === 0) {
        echo  "BuzzBazz\n";
      } else if ($number % 3 === 0) {
        echo "Fizz\n";
      } else if ($number % 5 === 0) {
        echo "Buzz\n";
      } else if ($number % 7 === 0) {
        echo "Bazz\n";
      } else {
        echo "$number\n";
      }
    }
  }
}

$fizzBuzzBazz = new FizzBuzzBazz();
$fizzBuzzBazz->generate(100);
