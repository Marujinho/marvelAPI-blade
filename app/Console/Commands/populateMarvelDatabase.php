<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Domain\ApiAuth\ApiAuthRepository;



class populateMarvelDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando pegará apenas os ids dos personagens da marvel para fazer as pontuações';

    protected $apiAuth;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ApiAuthRepository $apiAuth)
    {
        parent::__construct();
        $this->apiAuth = $apiAuth;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $marvelAuth = $this->apiAuth->marvelApiAuth();
      $client = new \GuzzleHttp\Client();

      $url = 'http://gateway.marvel.com/v1/public/series/15373/characters?&limit=25&ts='.$marvelAuth['timestamp'].'&apikey='.$marvelAuth['publicKey'].'&hash='.$marvelAuth['hash'];
      $request = $client->request('GET', $url);
      $marvelCharacters = collect(json_decode($request->getBody())->data->results);



    }
}
