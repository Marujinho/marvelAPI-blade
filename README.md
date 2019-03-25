# MARVELMASH

Uma aplicação utilizando a api da marvel (https://developer.marvel.com) com laravel 5.5. Utilizando a framework de front-end Blade. PHP ^7.
Utilizando para fazer o rank a equação do Rating ELO. https://pt.wikipedia.org/wiki/Rating_ELO.


# O que é?
São apresentados dois personagens e você decide quem venceria num duelo entre os dois.
No rodapé da pagina estará o rank entre os personagens que você julgou serem mais fortes


# Como Preparar o ambiente:

Para preparar o ambiente para receber rodar a aplicação, são necessários os seguintes passos:

1 - Depois de baixar o projeto no seu computador rode o composer Install.


2 - Configure o .env para acessar o banco de dados de acordo com seu usuario e senha. 


3 - Dentro da pasta raíz do projeto, rode o seguinte comando no terminal:  php artisan marvelmash:create.
Este comando criará uma tabela no banco para você.


4 - Agora rode o comando: php artisan migrate.
Este comando criará a tabela no banco que armazenará a pontuação dos personagens.


5 - Por ultimo, rode o comando: php artisan marvelmash:prepare
Este comando seleciona alguns personagens da marvel e os relaciona com as pontuações para ser feito o ranking durante as comparações.


Pronto, agora só servir a aplicação e utilizar!

