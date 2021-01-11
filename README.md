<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Invillia - API



#### Baixar projeto

```
git clone https://github.com/luiseduardosilva/invillia-api.git
```

#### Docker-compose

```
docker-compose up -d
```


#### Installar dependencias

```
docker exec -it invillia-php composer install
```

#### Chave Laravel
```
docker exec -it invillia-php php artisan key:generate
```

#### Copiar `.env`

```
cp .env.example .env
```


#### Configurar Banco de dados
```
DB_CONNECTION=pgsql
DB_HOST=invillia-postgres
DB_PORT=5432
DB_DATABASE=invillia
DB_USERNAME=invillia
DB_PASSWORD=invillia
```

#### Migrations
```
docker exec -it invillia-php php artisan migrate
```

#### Passport
```
docker exec -it invillia-php php artisan passport:install
```

