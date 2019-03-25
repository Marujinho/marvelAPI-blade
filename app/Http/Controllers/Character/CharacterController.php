<?php

namespace App\Http\Controllers\Character;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Domain\ApiAuth\ApiAuthRepository;
use Domain\Characters\CharactersRepository;

class CharacterController extends Controller
{

    protected $apiAuth;
    protected $character;

    /**
    * Create a new controller instance.
     * @param ApiAuthRepository $apiAuth
    */

    public function __construct(ApiAuthRepository $apiAuth, CharactersRepository $character)
    {

      $this->apiAuth = $apiAuth;
      $this->character = $character;
    }

    public function index()
    {
      $marvelAuth = $this->apiAuth->marvelApiAuth();
      $client = new \GuzzleHttp\Client();

      $characterId = $this->character->chooseCharactersToCompare();

      //pega o primeiro personagem
      $firstCharacterUrl = 'http://gateway.marvel.com/v1/public/characters/'.$characterId['first'].'?&limit=25&ts='.$marvelAuth['timestamp'].'&apikey='.$marvelAuth['publicKey'].'&hash='.$marvelAuth['hash'];
      $request = $client->request('GET', $firstCharacterUrl);
      $firstCharacter = collect(json_decode($request->getBody())->data->results)->first();

      //pega o segundo personagem
      $secondCharacterUrl = 'http://gateway.marvel.com/v1/public/characters/'.$characterId['second'].'?&limit=25&ts='.$marvelAuth['timestamp'].'&apikey='.$marvelAuth['publicKey'].'&hash='.$marvelAuth['hash'];
      $request = $client->request('GET', $secondCharacterUrl);
      $secondCharacter = collect(json_decode($request->getBody())->data->results)->first();

    
      //Pega os personagens por ordem de rank
      $rankedCharacters = $this->character->getCharacters()->sortByDesc('score')->take(5);

      return view('Characters.index', [
        'firstCharacter'   => $firstCharacter,
        'secondCharacter' => $secondCharacter,
        'rankedCharacters' => $rankedCharacters
      ]);
    }
}
