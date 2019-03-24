<?php

namespace App\Http\Controllers\Rank;

use App\Http\Controllers\Controller;

use Domain\Rank\RankRepository;
use Domain\Characters\CharactersRepository;
use Illuminate\Http\Request;

class RankController extends Controller
{
    protected $rank;

    protected $character;

    public function __construct(RankRepository $rank, CharactersRepository $character)
    {
      $this->rank = $rank;
      $this->character = $character;
    }

    public function updateRank($win_id, $lose_id)
    {
      $winnerCharacter = $this->character->getCharacterById($win_id);
      $losingCharacter = $this->character->getCharacterById($lose_id);


    	$winnerExpected = $this->rank->expected($losingCharacter->score, $winnerCharacter->score);
    	$winnerNewScore = $this->rank->win($winnerCharacter->score, $winnerExpected);

      $winnerCharacter->score = $winnerNewScore;
      $winnerCharacter->save();


	    $loserExpected = $this->rank->expected($winnerCharacter->score, $losingCharacter->score);
	    $loserNewScore = $this->rank->loss($losingCharacter->score, $loserExpected);

      $losingCharacter->score = $loserNewScore;
      $losingCharacter->save();

      return redirect()->route('characters.index');
    }
}
