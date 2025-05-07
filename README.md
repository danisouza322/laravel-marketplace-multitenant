# Marketplace Multi-Tenant Laravel

Sistema de marketplace multi-tenant desenvolvido em Laravel, permitindo que múltiplos lojistas gerenciem suas lojas virtuais independentes em uma única plataforma.

## Características Principais

- **Isolamento Multi-Tenant**: Cada lojista possui acesso apenas aos seus próprios dados (produtos, categorias, etc.)
- **Dashboard Personalizado**: Interface administrativa exclusiva para cada lojista
- **Gerenciamento de Produtos**: CRUD completo de produtos com upload de imagens e controle de status
- **Categorização**: Sistema de categorias para organização dos produtos
- **Registro de Lojistas**: Processo de cadastro público para novos lojistas
- **Administração Central**: Painel administrativo para controle de todas as lojas
- **Integração com WhatsApp**: Redirecionamento para contato direto com os lojistas

## Tecnologias Utilizadas

- **Laravel**: Framework PHP para desenvolvimento do backend
- **MySQL**: Banco de dados relacional para armazenamento de dados
- **Bootstrap**: Framework CSS para o frontend
- **jQuery**: Biblioteca JavaScript para manipulação do DOM
- **FontAwesome**: Biblioteca de ícones

## Requisitos de Sistema

- PHP >= 7.4
- MySQL >= 5.7
- Composer
- Node.js e NPM (para compilação de assets)
- Extensões PHP: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML

## Instalação

1. Clone o repositório
```bash
git clone https://github.com/danisouza322/laravel-marketplace-multitenant.git
cd laravel-marketplace-multitenant
```

2. Instale as dependências
```bash
composer install
npm install && npm run dev
```

3. Configure o ambiente
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure o banco de dados no arquivo `.env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=marketplace_multitenant
DB_USERNAME=root
DB_PASSWORD=
```

5. Execute as migrações e seeders
```bash
php artisan migrate --seed
```

6. Configure o storage para uploads
```bash
php artisan storage:link
```

7. Inicie o servidor de desenvolvimento
```bash
php artisan serve
```

## Estrutura do Projeto

- **app/Models**: Modelos do sistema (Tenant, Produto, Categoria, etc.)
- **app/Http/Controllers**: Controladores separados por contexto (Admin, Dashboard)
- **app/Http/Middleware**: Middlewares de autenticação e isolamento multi-tenant
- **resources/views**: Views organizadas por contexto (admin, dashboard, auth)
- **routes**: Rotas separadas por contexto

## Uso

### Acesso à Área de Lojista

1. Acesse `/criar-loja` para registrar uma nova loja
2. Preencha o formulário com os dados da loja (nome, email, senha, WhatsApp, etc.)
3. Após o registro, o lojista é redirecionado para o dashboard

### Acesso à Área Administrativa

1. Acesse `/login` e faça login com as credenciais de administrador
2. O administrador tem acesso a todas as lojas e pode gerenciá-las

## Contribuindo

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/nova-funcionalidade`)
3. Faça commit das suas alterações (`git commit -m 'Adiciona nova funcionalidade'`)
4. Faça push para a branch (`git push origin feature/nova-funcionalidade`)
5. Abra um Pull Request

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).

## Screenshots

*(Screenshots serão adicionados em breve)*

## Contato

Para questões e sugestões, entre em contato através das issues do GitHub ou pelo email: contato@exemplo.com
