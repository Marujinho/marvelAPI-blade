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

      //https://gateway.marvel.com:443/v1/public/series/15373/characters?orderBy=-name&limit=100&apikey=9c58a56196ee822a775d03f121b4ee6b avengers brabo
      //https://gateway.marvel.com:443/v1/public/series/3613/characters?orderBy=-name&limit=100&apikey=9c58a56196ee822a775d03f121b4ee6b ANIHILATION
      $url = 'http://gateway.marvel.com/v1/public/series/15373/characters?&limit=25&ts='.$marvelAuth['timestamp'].'&apikey='.$marvelAuth['publicKey'].'&hash='.$marvelAuth['hash'];
      $request = $client->request('GET', $url);

      $marvelCharacters = collect(json_decode($request->getBody())->data->results);

      // $request = new \GuzzleHttp\Psr7\Request('GET', 'http://gateway.marvel.com/v1/public/characters?ts='.$marvelAuth['timestamp'].'&apikey='.$marvelAuth['publicKey'].'&hash='.$marvelAuth['hash']);
      // $promise = $client->sendAsync($request)->then(function ($response) {
          // echo $response->getBody();
      // });
      // $promise->wait();

      // echo $res->getStatusCode();
      // // "200"
      // echo $request->getHeader('content-type')[0];
      // 'application/json; charset=utf8'
      $number = $this->character->getRandomNumbers();
      $firstCharacter = $marvelCharacters[$number['firstNumber']];
      $secondCharacter = $marvelCharacters[$number['secondNumber']];

      return view('marvelAPI.index', [
        'firstCharacter'   => $firstCharacter,
        'secondCharacter' => $secondCharacter
      ]);
    }
}
