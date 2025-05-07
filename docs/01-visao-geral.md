# Visão Geral e Arquitetura

## Sobre o Projeto

O projeto é um marketplace multi-tenant para lojistas, onde cada lojista (tenant) pode criar sua própria loja virtual e divulgar seus produtos. A plataforma terá uma página principal que exibirá produtos de todos os lojistas, filtrados por cidade. Em vez de um carrinho de compras, a interação entre cliente e lojista acontecerá via WhatsApp.

## Objetivos

- Criar uma plataforma onde lojistas possam divulgar seus produtos
- Oferecer lojas virtuais individuais para cada lojista (tenant)
- Monetizar através de assinaturas dos lojistas
- Facilitar a comunicação entre cliente e lojista via WhatsApp

## Modelo de Negócio

- Assinaturas pagas pelos lojistas (tenants)
- Diferentes planos com limites de produtos e funcionalidades
- Sem comissão por venda (transações ocorrem fora da plataforma)

## Arquitetura Técnica

### Estrutura Multi-Tenant

O projeto utilizará uma arquitetura multi-tenant baseada em tenant_id, onde:

- Cada lojista (tenant) possui seu próprio ambiente na plataforma
- Os dados são isolados a nível de banco utilizando tenant_id como filtro
- Cada loja possui uma URL específica no formato `/loja/{slug-da-loja}`

### Componentes Principais

1. **Marketplace Principal**
   - Exibe produtos de todos os lojistas
   - Permite filtros por cidade e categorias
   - Direciona para lojas individuais

2. **Lojas Individuais**
   - Exibe produtos específicos de cada lojista
   - URL no formato `/loja/{slug}`
   - Personalização básica (logo, banner, descrição)

3. **Painel do Lojista**
   - Gerenciamento de produtos
   - Configuração da loja
   - Gestão de assinatura

4. **Painel Administrativo**
   - Gerenciamento de lojistas
   - Controle de assinaturas
   - Relatórios e métricas

### Tecnologias Utilizadas

- **Backend**: Laravel 8+
- **Frontend**: Bootstrap 5
- **Banco de Dados**: MySQL/PostgreSQL
- **ORM**: Eloquent
- **Cache**: Redis (opcional)
- **Processamento de Imagens**: Intervention Image 