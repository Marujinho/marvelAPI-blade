# MARVELMASH

Uma aplicação utilizando a api da marvel () com laravel 5.5. Utilizando a framework de front-end Blade. PHP ^7


# O que é?
São apresentados dois personagens e você decide quem venceria num duelo entre os dois.
No rodapé da pagina estará o rank entre os personagens que você julgou serem mais fortes


# Como Preparar o ambiente:

Para preparar o ambiente para receber rodar a aplicação, são necessários os seguintes passos:


1 - Depois de baixar o projeto no seu computador, coloque um nome de sua escolha da tabela na variável DB_DATABASE no arquivo .env na raíz do projeto. 
Esta tabela armazenará alguns dados necessários para a aplicação funcionar.
Sugiro o nome 'marvelmash' :p


2 - Dentro da pasta raíz do projeto, rode o seguinte comando no terminal:  php artisan marvelmash:create.
Este comando criará uma tabela no banco para você.


3 - Agora rode o comando: php artisan migrate.
Este comando criará a tabela no banco que armazenará a pontuação dos personagens.


4 - Por ultimo, rode o comando: php artisan marvelmash:prepare
Este comando seleciona alguns personagens da marvel e os relaciona com as pontuações para ser feito o ranking durante as comparações.


Pronto, agora só servir a aplicação e utilizar!

