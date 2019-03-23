<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Domain\ApiAuth\ApiAuthRepository;
use Domain\Characters\CharactersRepository;

class ApiController extends Controller
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

      // $request = new \GuzzleHttp\Psr7\Request('GET', 'http://gateway.marvel.com/v1/public/characters/'.$characterId['first'].'?ts='.$marvelAuth['timestamp'].'&apikey='.$marvelAuth['publicKey'].'&hash='.$marvelAuth['hash']);
      // $promise = $client->sendAsync($request)->then(function ($response) {
          // echo $response->getBody();
      // });
      // $promise->wait();


      // echo $res->getStatusCode();
      // // "200"
      // echo $request->getHeader('content-type')[0];
      // 'application/json; charset=utf8'

      // $firstCharacter = $marvelCharacters[$number['firstNumber']];
      // $secondCharacter = $marvelCharacters[$number['secondNumber']];

      return view('marvelAPI.index', [
        'firstCharacter'   => $firstCharacter,
        'secondCharacter' => $secondCharacter
      ]);
    }
}
