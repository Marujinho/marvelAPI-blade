<?php

namespace Domain\Rank;

use Domain\Characters\Character;

class RankRepository
{
  protected $character;

  public function __construct(Character $character)
  {
    $this->model = $character;
  }

  function expected($Ra, $Rb)
  {
    return 1/(1 + pow(10, ($Ra - $Rb)/400));
  }

  public function win($score, $expected, $k = 24)
  {
  	return $score + $k * (1 - $expected);
  }

  public function loss($score, $expected, $k = 24)
  {
    return $score + $k * (0 - $expected);
  }

}
