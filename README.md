## Requisitos
- Docker
- Docker-compose
- Preferência SO linux

## Observações

- Fazer  o clone do projeto ou download em zip
- Acessar a pasta do projeto
- Verificar que nenhuma outra aplicação esta usando as porta 3306 e 8000

## Instação
- Copiar o .env.dist e renomear para .env
- docker-compose up

## Rodar os seguintes comandos - Passo 1
- docker-compose exec app composer install 
- docker-compose exec app php artisan key:generate
- docker-compose exec app npm install
- docker-compose exec app composer dump-autoload
## Passo 2
- php artisan migrate:fresh
- docker-compose exec app php artisan db:seed --class=CategorySeeder
## Acessar aplicação

- Acessar: http://localhost:8000


## Menus

- upload documents: http://localhost:8000
- dispatch queue =>  http://localhost:8000/dispatch-queue
