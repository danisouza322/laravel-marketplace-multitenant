# Configuração do Ambiente

## Requisitos do Sistema

- PHP 8.0+
- Composer
- Node.js e NPM
- MySQL 5.7+ ou PostgreSQL 10+
- Servidor web (Apache/Nginx)

## Instalação

### 1. Clonar o Repositório

```bash
git clone [url-do-repositorio]
cd [nome-do-projeto]
```

### 2. Instalar Dependências

```bash
composer install
npm install
npm run dev
```

### 3. Configurar Variáveis de Ambiente

Copie o arquivo `.env.example` para `.env` e configure as variáveis:

```bash
cp .env.example .env
php artisan key:generate
```

Configure o banco de dados no arquivo `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

### 4. Executar Migrações e Seeds

```bash
php artisan migrate --seed
```

### 5. Configurar Armazenamento

```bash
php artisan storage:link
```

### 6. Configurar Hosts Locais (Opcional)

Para desenvolvimento local, adicione ao arquivo hosts:

```
127.0.0.1 minhavitrine.test
```

E configure seu servidor web para apontar para a pasta `public` do projeto.

## Ambientes

- **Desenvolvimento**: `.env` com `APP_ENV=local` e `APP_DEBUG=true`
- **Homologação**: `.env` com `APP_ENV=staging` e `APP_DEBUG=false`
- **Produção**: `.env` com `APP_ENV=production` e `APP_DEBUG=false`

## Configurações Adicionais

### Uploads de Imagens

Certifique-se de que as pastas de upload tenham permissões adequadas:

```bash
chmod -R 775 storage/
chmod -R 775 public/uploads/
```

### Redis (Opcional)

Para utilizar cache com Redis, configure no `.env`:

```
CACHE_DRIVER=redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

### Configuração de E-mail

Configure o envio de e-mails no `.env`:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
``` 