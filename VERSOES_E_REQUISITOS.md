# Versões e Requisitos do Projeto

## Versões Utilizadas

- **PHP**: 8.2.12
- **Laravel**: 11.29.0
- **MySQL**: 5.7 ou superior (recomendado 8.0)
- **Composer**: 2.0 ou superior
- **Node.js**: 14.0 ou superior
- **npm**: 6.0 ou superior

## Extensões PHP Necessárias

- BCMath
- Ctype
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO
- Tokenizer
- XML
- GD (para manipulação de imagens)
- Zip

## Arquivo .env

Abaixo está um modelo do arquivo .env que você precisará configurar na nova máquina:

```
APP_NAME="Marketplace Multi-Tenant"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=marketplace_multitenant
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```

## Próximos Passos de Desenvolvimento

Conforme o checklist do projeto, aqui estão as próximas etapas a serem desenvolvidas:

1. **Módulo de Assinaturas**:
   - Criar migrações para planos e assinaturas
   - Implementar modelos Plano e Assinatura
   - Desenvolver páginas de planos e checkout

2. **Módulo de Marketplace**:
   - Criar página inicial com produtos em destaque
   - Implementar busca e filtros de produtos
   - Desenvolver páginas individuais de lojas

3. **Testes e Qualidade**:
   - Implementar testes unitários
   - Configurar testes de integração
   - Verificar isolamento de dados entre tenants

4. **Deployment e Finalização**:
   - Preparar para ambiente de produção
   - Configurar servidor
   - Finalizar documentação 