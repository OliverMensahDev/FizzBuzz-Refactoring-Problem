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

class BazzRule  implements RuleInterface
{
  public function matches(int $number): bool
  {
    return $number % 7 === 0;
  }

  public function getReplacement(): string
  {
    return 'Bazz';
  }
}

class BuzzBazzRule  implements RuleInterface
{
  public function matches(int $number): bool
  {
    return $number % 5 === 0 && $number % 7 === 0;
  }

  public function getReplacement(): string
  {
    return 'BuzzBazz';
  }
}

class FizzBazzRule  implements RuleInterface
{
  public function matches(int $number): bool
  {
    return $number % 3 === 0 &&  $number % 7 === 0;
  }

  public function getReplacement(): string
  {
    return 'FizzBazz';
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

class FizzBuzzBazzRule  implements RuleInterface
{
  public function matches(int $number): bool
  {
    return $number % 3 === 0 &&  $number % 5 === 0 && $number % 7 === 0;
  }

  public function getReplacement(): string
  {
    return 'FizzBuzzBazz';
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
  new FizzRule(),
  new BuzzRule(),
  new BazzRule,
  new BuzzBazzRule,
  new FizzBazzRule,
  new FizzBuzzRule(),
  new FizzBuzzBazzRule
];
$fizzBuzz = new FizzBuzz($rules);
$list = $fizzBuzz->generateList(100);
var_dump($list);
