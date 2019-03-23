<?php

namespace Domain\Characters;


class CharactersRepository
{

  public function getRandomNumbers()
  {
    $firstNumber = rand(0, 24);
    $secondNumber = rand(0, 24);

    if($firstNumber == $secondNumber){
      return $this->getRandomNumbers();
    }else{
      return [
        'firstNumber'  => $firstNumber,
        'secondNumber' => $secondNumber
      ];
    }
  }


}
