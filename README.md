# Desafio Edebê

Aplicação que dá oportunidade de aprender os Continentes/Países/Capitais/Bandeiras de uma maneira divertida e intuitiva.

## Instalação

Criando o ambiente da API.

``` bash
$ mkdir db
$ docker-conpose up -d
$ docker exec -it php7-apache2 bash
$ mv .env.example .env
$ composer install
$ php artisan migrate
$ php artisan make:console ImportCron --command=import:cron
```
Subindo front:

``` bash
$ cd front
$ npm install
$ ng serve
```
