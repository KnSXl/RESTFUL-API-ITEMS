# RESTFUL-API-ITEMS

## SOBRE O PROJETO

API RESTful de itens que permite listar, buscar por ID, adicionar, editar e excluir. Também suporta traduções com base no header `Accept-Language` da requisição, com suporte aos idiomas: en-US e pt-BR.

## REQUISITOS

- PHP (versão 8.2+)
- Docker (em execução)
- Composer
- Node.js

## PASSO A PASSO

### CLONE O REPOSITÓRIO

```bash
git clone https://github.com/KnSXl/RESTFUL-API-ITEMS
````

### ACESSE O REPOSITÓRIO

```bash
cd RESTFUL-API-ITEMS
```

### INSTALE AS DEPENDÊNCIAS INICIAIS

```bash
npm install
```

### ACESSE A PASTA `DB`

```bash
cd DB
```

### COPIE O ARQUIVO `.env.example` PARA `.env`

```bash
cp .env.example .env
```

### INICIE OS CONTAINERS

```bash
docker-compose up -d
```

### VOLTE PARA A PASTA RAIZ

```bash
cd ..
```

### ACESSE A PASTA `BACK-END`

```bash
cd BACK-END
```

### INSTALE AS DEPENDÊNCIAS DO COMPOSER

```bash
composer install
```

### COPIE O ARQUIVO `.env.example` PARA `.env`

```bash
cp .env.example .env
```

### EDITE O ARQUIVO `.env` (EXEMPLO DE CONFIGURAÇÃO)

```dotenv
APP_NAME=Backend
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
APP_TIMEZONE=America/Sao_Paulo

APP_LOCALE=en-US
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=backend
DB_USERNAME=user
DB_PASSWORD=password

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
# CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
```

### GERE A `APP_KEY`

```bash
php artisan key:generate
```

### MIGRE AS TABELAS PARA O BANCO DE DADOS

```bash
php artisan migrate
```

### INICIE O SERVIDOR

```bash
php artisan serve
```
--- 

### INICIAR `DB` E `BACK-END` AO MESMO TEMPO

Estando na raiz do projeto (`RESTFUL-API-ITEMS`), você pode usar o comando abaixo para iniciar tanto os containers do Docker (`DB`) quanto o servidor do `BACK-END`, sem precisar acessar as pastas separadamente:

```bash
npm run all
````

Esse comando irá subir os containers do Docker e iniciar o servidor do `BACK-END`.

## ACESSO AO PROJETO

### HEADER
* `Accept-Language` → `pt-BR` ou `en-US` (`en-US` é o padrão do servidor.)

### PROJETO

* [http://localhost:8000](http://localhost:8000) ou [http://127.0.0.1:8000](http://127.0.0.1:8000)

### ENDPOINTS

* `GET` [http://localhost:8000/api/items](http://localhost:8000/api/items) → Listar todos os itens
* `GET` [http://localhost:8000/api/items/{id}](http://localhost:8000/api/items/{id}) → Obter item específico
* `POST` [http://localhost:8000/api/items](http://localhost:8000/api/items) → Criar um novo item
* `PUT/PATCH` [http://localhost:8000/api/items/{id}](http://localhost:8000/api/items/{id}) → Atualizar item
* `DELETE` [http://localhost:8000/api/items/{id}](http://localhost:8000/api/items/{id}) → Deletar item

### BANCO DE DADOS (PHPMYADMIN)

* [http://localhost:8888](http://localhost:8888) ou [http://127.0.0.1:8888](http://127.0.0.1:8888)