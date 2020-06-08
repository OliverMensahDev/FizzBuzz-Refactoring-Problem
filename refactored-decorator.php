<?
interface Rule
{
    function print(int $number, bool $match);
}

class NotMatchRule implements Rule
{
    public function print(int $number, bool $matched)
    {
        if(! $matched) { 
            printf('%d', $number);
        }
        echo PHP_EOL;
    }
}

class MatchRule implements Rule
{
    private $name;
    private $number;
    private $nested_rule;

    public function __construct(int $number, string $name, Rule $rule)
    {
        $this->number = $number;
        $this->name = $name;
        $this->nested_rule = $rule;
    }

    public function print(int $number, bool $matched)
    {
        if ($number % $this->number == 0) {
            echo $this->name;
            $this->nested_rule->print($number, true);
        } else {
            $this->nested_rule->print($number, $matched);
        }
    }
}

$FizzBuzzBazzRule = new MatchRule(3, 'Fizz',  new MatchRule(5, "Buzz", new MatchRule(7,"Bazz" ,new NotMatchRule())));

for($i = 1; $i < 100 ; $i++){
  $FizzBuzzBazzRule->print($i, false);
}