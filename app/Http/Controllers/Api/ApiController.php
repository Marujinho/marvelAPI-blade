<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Domain\ApiAuth\ApiAuthRepository;


class ApiController extends Controller
{

    protected $apiAuth;

    /**
    * Create a new controller instance.
     * @param ApiAuthRepository $apiAuth
    */

    public function __construct(ApiAuthRepository $apiAuth)
    {

      $this->apiAuth = $apiAuth;
    }

    public function index()
    {

      $client = new \GuzzleHttp\Client();
      $marvelAuth = $this->apiAuth->marvelApiAuth();
      //https://gateway.marvel.com:443/v1/public/series/15373/characters?orderBy=-name&limit=100&apikey=9c58a56196ee822a775d03f121b4ee6b avengers brabo
      //https://gateway.marvel.com:443/v1/public/series/3613/characters?orderBy=-name&limit=100&apikey=9c58a56196ee822a775d03f121b4ee6b ANIHILATION
      $url = 'http://gateway.marvel.com/v1/public/series/15373/characters?orderBy=-name&limit=100&ts='.$marvelAuth['timestamp'].'&apikey='.$marvelAuth['publicKey'].'&hash='.$marvelAuth['hash'];
      // print_r($url2);
      // dd($marvelAuth);
      $request = $client->request('GET', $url);
      // $promise = $client->sendAsync($res)->then(function ($response) {
      //     echo 'I completed! ' . $response->getBody();
      // });
      // $request = new \GuzzleHttp\Psr7\Request('GET', 'http://gateway.marvel.com/v1/public/characters?ts='.$marvelAuth['timestamp'].'&apikey='.$marvelAuth['publicKey'].'&hash='.$marvelAuth['hash']);
      // $promise = $client->sendAsync($request)->then(function ($response) {
          // echo $response->getBody();
          // echo 'linguiça';
      // });
      // $promise->wait();

      // $image = $client->request('GET', 'http://i.annihil.us/u/prod/marvel/i/mg/3/40/4bb4680432f73/portrait_xlarge.jpg');


      // echo $res->getStatusCode();
      // // "200"
      // echo $request->getHeader('content-type')[0];
      // 'application/json; charset=utf8'
      $result = $request->getBody();
      // dd(collect(json_decode($request->getBody())->data->results));
      $characters = collect(json_decode($request->getBody())->data->results);

      // $character = json_decode($request->getBody());
      // var_export($result->eof());
      // dd($characters[0]->thumbnail->path.".".$characters[0]->thumbnail->extension);
      // echo $result;
      return view('marvelAPI.index', [
        'characters' => $characters
      ]);


    }
}
