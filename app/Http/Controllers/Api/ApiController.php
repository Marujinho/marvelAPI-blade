<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ApiController extends Controller
{
    public function index()
    {
      $timestamp = now()->timestamp;
      $pk = env('MARVEL_PVT_KEY');
      $publicKey = env('MARVEL_PUBLIC_KEY');
      $hash = md5($timestamp.$pk.$publicKey);

      $client = new \GuzzleHttp\Client();

      $res = $client->request('GET', 'http://gateway.marvel.com/v1/public/characters/1011334?ts='.$timestamp.'&apikey=9c58a56196ee822a775d03f121b4ee6b&hash='.$hash);
      // $promise = $client->sendAsync($res)->then(function ($response) {
      //     echo 'I completed! ' . $response->getBody();
      // });

      // $image = $client->request('GET', 'http://i.annihil.us/u/prod/marvel/i/mg/3/40/4bb4680432f73/portrait_xlarge.jpg');


      // echo $res->getStatusCode();
      // // "200"
      // echo $res->getHeader('content-type')[0];
      // 'application/json; charset=utf8'

      $result = $res->getBody();
      echo $result;exit;

      // echo $result;
      return view('marvelAPI.index');


    }
}
