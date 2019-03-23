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
    protected $description = 'Este comando pegará apenas os ids dos personagens da marvel para fazer as pontuações';

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
        $this->info(sprintf('Ops... não consegui encontrar a tabela, verifique se executou todos comandos para preparar a aplicação!'));
        return;
      }

      if(!$checkDatabase->isEmpty()){
        $this->info(sprintf('Este comando não é mais necessário. A aplicação ja foi preparada ;)'));
        return;
      }

      $this->info(sprintf('Aguarde, estamos preparando a aplicação...'));

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
          $char->save();
      });

      $this->info(sprintf('Aplicação está pronta para usar :)'));
    }
}
