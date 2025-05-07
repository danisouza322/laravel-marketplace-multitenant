# Checklist de Desenvolvimento

Este documento serve como controle das tarefas de implementação do projeto. À medida que avançamos, vamos marcando os itens concluídos.

## Configuração Inicial

- [x] Criação da documentação inicial
- [x] Configuração do ambiente de desenvolvimento
- [ ] Preparação do repositório Git
- [ ] Definição de padrões de código e convenções

## Implementação Multi-Tenant

- [x] Criação das migrações para tabelas de tenants
- [x] Criação do modelo Tenant
- [x] Implementação do middleware TenantMiddleware
- [x] Implementação do middleware AdminMiddleware
- [x] Registro dos middlewares no Kernel
- [x] Implementação de Global Scopes para isolamento de dados (através da trait BelongsToTenant)
- [ ] Testes de isolamento de dados

## Módulo de Lojistas

- [x] Criação do sistema de registro de lojistas
- [x] Implementação da autenticação específica para lojistas
- [x] Dashboard do lojista (estrutura inicial)
- [x] Gerenciamento de perfil de loja (logo, banner, descrição)
- [x] Configuração do WhatsApp de contato
- [ ] Visualização da assinatura atual

## Módulo de Produtos

- [x] Criação das migrações para produtos e imagens
- [x] Criação do modelo Produto
- [ ] Criação do modelo ImagemProduto
- [x] CRUD completo de produtos
- [x] Upload e gerenciamento de imagens
- [x] Sistema de categorização
- [x] Controle de disponibilidade

## Módulo de Marketplace

- [ ] Página inicial com produtos em destaque
- [ ] Listagem de produtos com filtros
- [ ] Busca de produtos
- [ ] Exibição de produtos por cidade
- [ ] Páginas individuais de loja por slug
- [ ] Redirecionamento para WhatsApp

## Módulo de Assinaturas

- [ ] Criação das migrações para planos e assinaturas
- [ ] Criação do modelo Plano
- [ ] Criação do modelo Assinatura
- [ ] Página de planos disponíveis
- [ ] Implementação de limites baseados em plano
- [ ] Integração com gateway de pagamento (fase posterior)

## Painel Admin

- [x] Dashboard administrativo (estrutura inicial)
- [x] Gerenciamento de lojistas
- [ ] Gerenciamento de planos
- [ ] Visualização e controle de assinaturas
- [ ] Relatórios básicos

## Integrações

- [x] Integração com WhatsApp
- [ ] SEO básico para marketplace e lojas
- [ ] Compartilhamento em redes sociais

## Testes e Qualidade

- [ ] Testes unitários
- [ ] Testes de integração
- [ ] Testes de isolamento de dados entre tenants
- [ ] Revisão de segurança

## Deployment e Finalização

- [ ] Preparação para ambiente de produção
- [ ] Configuração do servidor
- [ ] Migração e seed inicial
- [ ] Documentação final 