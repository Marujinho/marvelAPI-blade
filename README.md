# MARVELMASH

Uma aplicação utilizando a api da marvel (https://developer.marvel.com) com laravel 5.5. Utilizando a framework de front-end Blade. PHP ^7.
Utilizando para fazer o rank a equação do Rating ELO. https://pt.wikipedia.org/wiki/Rating_ELO.


# What is it?
It will be presented two Marvel characters and you decide who would win if they fought. <br />
In The footer of the screen will display the rank according to your votes using the application algorithm


# Installing:

To prepare the envirioment is necessary the following commands in your local machine:

* **git clone https://github.com/Marujinho/marvelAPI-blade.git** 
(That will clone the repository)

* **cd marvelAPI-blade**
(Enter the repository folder)

* **composer install**
(will download the dependencies)

Configure your **.env** file with your local database credentials 

**php artisan marvelmash:create**
(This command will create a table in database if you configured your .env file correctly)


**php artisan migrate**
(This will created table in database which will store the characters' score)


**php artisan marvelmash:prepare**
(This command will select some Marvel characters, and prepares them for the ranking during the comparisons)

**php artisan serve**
Serves the application



