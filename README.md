# MARVELMASH

It's a game where you vote who would win in a battle given two Marvel characters per round, and a rank get built while you play it.
Application using **Marvel's api** (https://developer.marvel.com) with Laravel 5.5 at the time it was built and php ^7.
Algorithm used for the ranking is **Rating ELO** (https://pt.wikipedia.org/wiki/Rating_ELO)


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

* Configure your **.env** file with your local database credentials 

* **php artisan marvelmash:create**
(This command will create a table in database if you configured your .env file correctly)


* **php artisan migrate**
(This will created table in database which will store the characters' score)


* **php artisan marvelmash:prepare**
(This command will select some Marvel characters, and prepares them for the ranking during the comparisons)

* **php artisan serve**
Serves the application



