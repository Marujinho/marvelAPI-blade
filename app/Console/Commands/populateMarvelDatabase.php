<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Domain\ApiAuth\ApiAuthRepository;
use Domain\Characters\Character;



class populateMarvelDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'marvelmash:prepare';

    /**
     * The console command description.
     *
     * @var string
     */                       
    protected $description = "This command will only get marvel characters' ids to create the score system";

    protected $apiAuth;
    protected $character;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ApiAuthRepository $apiAuth, Character $character)
    {
        parent::__construct();
        $this->apiAuth = $apiAuth;
        $this->model = $character;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      try {
        $checkDatabase = $this->model->get();
      } catch (\Exception $e) {
        $this->info(sprintf("Ops... An error occurred, please chack if you've executed all necessary prior commands! for the application to run"));
        return;
      }

      if(!$checkDatabase->isEmpty()){
        $this->info(sprintf('This command is no longer necessary. The application has already been prepared ;)'));
        return;
      }

      $this->info(sprintf('Hold on a little bit... The application is being installed'));

      //popula o banco com os ids e scores necessarios para funcionar as comparações e ranking dos personagens
      $marvelAuth = $this->apiAuth->marvelApiAuth();
      $client = new \GuzzleHttp\Client();
      $url = 'http://gateway.marvel.com/v1/public/series/15373/characters?&limit=25&ts='.$marvelAuth['timestamp'].'&apikey='.$marvelAuth['publicKey'].'&hash='.$marvelAuth['hash'];
      $request = $client->request('GET', $url);
      $marvelCharacters = collect(json_decode($request->getBody())->data->results);

      $marvelCharacters->map(function($marvelCharacter){

          $char = new Character;
          $char->character_id = $marvelCharacter->id;
          $char->score = 1500;
          $char->thumb = $marvelCharacter->thumbnail->path.'.'.$marvelCharacter->thumbnail->extension;
          $char->save();
      });

      $this->info(sprintf('OK!! Application is ready to be served :)'));
    }
}
