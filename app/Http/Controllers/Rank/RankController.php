<?php

namespace App\Http\Controllers\Rank;

use App\Http\Controllers\Controller;

use Domain\Rank\RankRepository;



class RankController extends Controller
{
    protected $rank;

    public function __construct(RankRepository $rank)
    {
      $this->rank = $rank;
    }


    public function update($winner, $loser)
    {
      dd('winner '.$winner);

    }
}
