# Pedro de Lara

```
                   .___                   .___       .__                       
 ______   ____   __| _/______  ____     __| _/____   |  | _____ ____________   
 \____ \_/ __ \ / __ |\_  __ \/  _ \   / __ |/ __ \  |  | \__  \\_  __ \__  \  
 |  |_> >  ___// /_/ | |  | \(  <_> ) / /_/ \  ___/  |  |__/ __ \|  | \// __ \_
 |   __/ \___  >____ | |__|   \____/  \____ |\___  > |____(____  /__|  (____  /
 |__|        \/     \/                     \/    \/            \/           \/ 
```

Minha versão laravel/php para a [rinha do backend 2ª edição](https://github.com/zanfranceschi/rinha-de-backend-2024-q1) 2024/Q1

## Stack

* PHP 8.3.3 + Composer 2.7.1
* PostgreSQL
* Nginx

## Instalação de gems

```
$ docker-compose run api1 bundle

ou

$ make instal.ando
```

## Uso em Dev

```
$ docker compose up -d nginx

ou

$ make dev.ando
```

## Uso em Prod

```
$ docker-compose -f docker-compose-prod.yml up -d nginx

ou

$ make produz.indo
```

## Testes de Estresse

```
$ make estress.ando
$ open load-test/user-files/results/**/index.html
```

## Resultados Obtidos

