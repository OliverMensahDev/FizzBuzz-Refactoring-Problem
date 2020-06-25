<?
interface Rule
{
    function print(int $number, bool $isMatch);
}


class NonMatchedRule implements Rule
{
    public function print(int $number, bool $isMatched)
    {
        if(!$isMatched) { 
            echo $number;
        }
        echo PHP_EOL;
    }
}

class MatchedRule implements Rule
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

    public function print(int $number, bool $isMatched)
    {
        if ($number % $this->number == 0) {
            echo $this->name;
            $this->nested_rule->print($number, true);
        } else {
            $this->nested_rule->print($number, $isMatched);
        }
    }
}

$FizzBuzzBazz = new MatchedRule(3, 'Fizz',  
                      new MatchedRule(5, "Buzz", 
                        new MatchedRule(7,"Bazz" ,
                          new NonMatchedRule()
                         )
                       )
                    );

for($i = 1; $i < 100 ; $i++){
  $FizzBuzzBazz->print($i, false);
}