<?php
interface RuleInterface
{
  public function matches(int $number): bool;
  public function getReplacement(): string;
}

class FizzRule  implements RuleInterface
{
  public function matches(int $number): bool
  {
    return $number % 3 === 0;
  }

  public function getReplacement(): string
  {
    return 'Fizz';
  }
}

class BuzzRule  implements RuleInterface
{
  public function matches(int $number): bool
  {
    return $number % 5 === 0;
  }

  public function getReplacement(): string
  {
    return 'Buzz';
  }
}

class FizzBuzzRule  implements RuleInterface
{
  public function matches(int $number): bool
  {
    return $number % 3 === 0 && $number % 5 === 0;
  }

  public function getReplacement(): string
  {
    return 'FizzBuzz';
  }
}

class FizzBuzz
{
  private $rules;

  public function __construct(array $rules)
  {
    $this->rules = $rules;
  }
  public function generateList(int $limit): array
  {
    $list = [];
    for ($number = 1; $number <= $limit; $number++) {
      $list[] = $this->generateElement($number);
    }
    return $list;
  }

  private function generateElement(int $number): string
  {
    foreach ($this->rules as $rule) {
      if ($rule->matches($number)) return $rule->getReplacement();
    }
    return (string) $number;
  }
}

$rules = [
  new FizzBuzzRule(),
  new FizzRule(),
  new BuzzRule()
];
$fizzBuzz = new FizzBuzz($rules);
$list = $fizzBuzz->generateList(100);
var_dump($list);
