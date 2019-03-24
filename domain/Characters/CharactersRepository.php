<?php

namespace Domain\Characters;


class CharactersRepository
{
  protected $character;

  public function __construct(Character $character)
  {
    $this->model = $character;
  }

  public function getCharacters()
  {
    return $this->model->get();
  }

  public function chooseCharactersToCompare()
  {
    //Seleciona numeros aleatórios para escolher do array dos ids dos personagens do banco
    $firstNumber = rand(0, 24);
    $secondNumber = rand(0, 24);

    //Verifica se não esta vindo o mesmo personagem
    if($firstNumber == $secondNumber){
      return $this->chooseCharactersToCompare();
    }

    $marvelCharacters = $this->model->get();

    return [
      'first'  => $marvelCharacters[$firstNumber]->character_id,
      'second' => $marvelCharacters[$secondNumber]->character_id
    ];
  }

  public function getCharacterById($character_id)
  {
    return $this->model->where('character_id', '=', $character_id)->first();
  }

}
